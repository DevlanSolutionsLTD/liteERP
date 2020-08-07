<?php
	function check_login()
	{
		if(strlen($_SESSION['login_user_email'])==0)
			{
				$host = $_SERVER['HTTP_HOST'];
				$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra="index.php";
				$_SESSION["login_user_email"]="";
				header("Location: http://$host$uri/$extra");
			}
	}
?>
