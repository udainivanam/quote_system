<?php
require 'mysql.php';
class authenticate{
			function validate($username, $password)
			{
				$mysql= new mysql();
				$ensure_credentials= $mysql -> verifyuserandpass($username, $password);
			        if($ensure_credentials)
				{
					$_SESSION['status'] = 'authorized';
					header('location: quote.php');
				}
				else return 'please enter correct username and password';
			}
			function validate1($username, $password)
			{
			echo "hhelo1";
				$mysql= new mysql();
				$ensure_credentials= $mysql -> verifyuserandpass($username, $password);
			
				if($ensure_credentials)
				{
					$_SESSION['status'] = 'authorized';
					header('location: admininterface.php');
				}
				else return 'please enter correct username and password';

			}
			
			function validate3($username, $password)
			{
echo "hello3";
				$mysql= new mysql();
				$ensure_credentials= $mysql -> verifyuserandpass($username, $password);
			
				if($ensure_credentials)
				{
					$_SESSION['status'] = 'authorized';
					header('location: hqassociateint.php');
				}
				else return 'please enter correct username and password';

			}
			
			
//for logging user out

			function logmemberout()
			{
			if(isset($_SESSION['status'])){
											unset($_SESSION['status']);

			         			  }
			if(isset($_COOKIE[session_name()]))				{
												setcookie(session_name(),'',time() - 1000);							session_destroy();											}													}			
			
			function confirm_member()
			{
			 session_start();
			 if ($_SESSION['status']!= 'authorized') header('location: salesassociatelogin.php');
     			}
}
?>

