<?php
    class posts {
		private $dbs;   
   			
		public function __construct($path){
			include($path);
			$this->dbs = /*is_object($dbs) ? */$dbs/* : null*/;
			//if(is_object($dbs)) echo "good";
		}
		// adding a new post
		public function addNewPost($userId,$semester,$type,$subject,$fileId="",$title,$content){
			$stmt = $this->dbs->prepare("INSERT INTO posts (id_minion,semester,pub_date,pub_type,pub_subject,id_file,post_content,post_title)
										 VALUES (?,?,?,?,?,?,?,?)");
			$res = $stmt->execute(array($userId,$semester,strftime("%Y-%m-%d %H:%M:%S",time()),$type,$subject,$fileId,$content,$title));
			return $res;
		}
		// retrieve posts from db
		public function postsDisplaying($semester="",$subject=""){
			$sql_query = "SELECT id_post,minions.user_name,pub_date,pub_type,post_title
						  FROM minions, posts
						  WHERE minions.id_minion = posts.id_minion ";
			$exe_params = array();
			if ($semester != ""){
				$sql_query .= "AND semester = ? ";
				$exe_params = array($semester);
				
				if ($subject != ""){
				$sql_query .= "AND pub_subject = ? ";
				$exe_params = array($semester,$subject);
			}
			}
			/*Limiting the query here*/
			$sql_query .= "Order by pub_date desc LIMIT 10";
			$stmt = $this->dbs->prepare($sql_query);
			$stmt->execute($exe_params);
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function postDisplaying($post_id){
			$sql_query = "SELECT minions.user_name,full_name,post_title,post_content,semester,pub_date
						  FROM minions, posts
						  WHERE minions.id_minion = posts.id_minion
						  AND id_post = ? LIMIT 1 ";
			//$sql_query .= "Order by cmt_date desc LIMIT 10";
			$stmt = $this->dbs->prepare($sql_query);
			$stmt->execute(array($post_id));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		public function commentsDisplaying($post_id){
			$sql_query = "SELECT minions.user_name,cmt_date,cmt_content
						  FROM minions, comments
						  WHERE minions.id_minion = comments.id_minion
						  AND id_post = ? ";
			$sql_query .= "Order by cmt_date desc LIMIT 10";
			$stmt = $this->dbs->prepare($sql_query);
			$stmt->execute(array($post_id));
			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function addNewComment($post_id,$user_id,$content){
			$stmt = $this->dbs->prepare("INSERT INTO comments (id_post,id_minion,cmt_content,cmt_date)
										 VALUES (?,?,?,?)");
			$res = $stmt->execute(array($post_id,$user_id,$content,strftime("%Y-%m-%d %H:%M:%S",time())));
			return $res;
		}
		
		}
	//$path = "../database/connection.php";
	$posts = new posts($path);
?>