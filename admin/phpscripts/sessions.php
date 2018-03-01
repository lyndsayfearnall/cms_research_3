<?php

	session_start();

	function confirm_logged_in() {
		if(!isset($_SESSION['user_id'])){
			redirect_to("admin_login.php");
		}
	}
	//session only exists on the server, once browser is terminated, session is destroyed
	//protecting admin so that only someone logged in has access

	function logged_out(){
		session_destroy();
		redirect_to("../admin_login.php"); //pay attention to what file is making the call, index file sends us into sessions to make the call
		//need to redirect back out of phpscripts folder
	}

?>
