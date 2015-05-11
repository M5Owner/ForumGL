<?php
    class minions {
    	private $dbs; // variable to hold PDO connection
    	
    	//constructor to have connection once the minions object is created :)
		public function __construct($path){
			include "$path";
			$this->dbs = /*is_object($dbs) ? */$dbs/* : null*/;
			//if(is_object($dbs)) echo "good";
		}
		// retrieve user name from an ID
		public function getUsernameById($user_id){
			$user_id = (int)$user_id;
			$stmt = $this->dbs->prepare("SELECT user_name
										 FROM minions
										 WHERE id_minion = ?
										 LIMIT 1");
			$stmt->execute(array($user_id));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			return $res['user_name'];
		}
		
		public function getIdByUsername($user_name){
			$stmt = $this->dbs->prepare("SELECT id_minion
										 FROM minions
										 WHERE user_name = ?
										 LIMIT 1");
			$stmt->execute(array($user_name));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			return $res['id_minion'];
		}
		// retrieve user name from an ID
		public function checkIfexist($user_name){

			$stmt = $this->dbs->prepare("SELECT user_name
										 FROM minions
										 WHERE user_name = ?
										 LIMIT 1");
			$stmt->execute(array($user_name));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			if($res['user_name'])
				return $res['user_name'];
			else return 0;
		}
		
		public function checkIfexistEmail($user_name){

			$stmt = $this->dbs->prepare("SELECT email
										 FROM minions
										 WHERE email = ?
										 LIMIT 1");
			$stmt->execute(array($user_name));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			if($res['email'])
				return $res['email'];
			else return 0;
		}
		
		public function addNewUser($full_name,$user_name,$email,$passwd){
			/*must check inputs validity */
			
			/*Salting password*/
				/*Generating a unique salt and make the password*/
				$random = "salt".strtotime("last sunday").time();
				$salt = hash('SHA512',$random);
				$enc_passwd = hash('SHA512',$salt.$passwd);
				
			/*put things in database*/
			$stmt = $this->dbs->prepare("INSERT INTO minions (full_name,user_name,email,enc_password,enc_salt)
										 VALUES (?,?,?,?,?)");
			$stmt->execute(array($full_name,$user_name,$email,$enc_passwd,$salt));
			if($this->checkIfexist($user_name)){
				return 1;
			}
			else{return 0;}
			
		}
		
		public function isGoodLogin($uore,$password){
			$stmt = $this->dbs->prepare("SELECT enc_password, enc_salt
										 FROM minions
										 WHERE user_name = ?
										 OR email = ?
										 LIMIT 1");
			$stmt->execute(array($uore,$uore));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			
			// encrypt the entered password
			$db_passwd = $res['enc_password'];
			$db_salt = $res['enc_salt'];
			$user_passwd = hash('SHA512',$db_salt.$password);
			
			// comparer l3ibat 
			if($user_passwd == $db_passwd){
				return true;
			}else return false;
		}
		
		public function isGoodLoginSess($username,$db_passwd){
			$stmt = $this->dbs->prepare("SELECT user_name
										 FROM minions
										 WHERE user_name = ?
										 AND enc_password = ?
										 LIMIT 1");
			$stmt->execute(array($username,$db_passwd));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(count($res) > 0)
				return 1;
			else
				return 0;
		}
		
		public function sessionInitialize($username,$password,$toRemembre){
			$stmt = $this->dbs->prepare("SELECT enc_password
										 FROM minions
										 WHERE user_name = ?
										 OR email = ?
										 LIMIT 1");
			$stmt->execute(array($username,$username));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['username'] = $username;
			$_SESSION['access_string'] = $res['enc_password'];
			if($toRemembre == TRUE){
				setcookie('username',$username,strtotime(" +30 days "),null,null,false,true);
				setcookie('access_string',$res['enc_password'],strtotime(" +30 days "),null,null,false,true);
			}
		}
}
    $currentUser = new minions($path);

?>