        $(document).ready(function () {
            $(".threadnum").mouseenter(function() {
			    $(this).css("opacity", "0.5").css("padding-left", "50px").css("transition", "0.7s ease");
			    // $(".type").css("padding-left", "30px").css("transition", "0.7s ease");

			}).mouseleave(function() {
			     $(this).css("padding-left", "5px").css("opacity", "1");
			     // $(".type").css("padding-left", "5px");
			});
             if($('.things tr.p_u_b').length == 0){
                $('.nopost').css("display","none");
             }
            
        });