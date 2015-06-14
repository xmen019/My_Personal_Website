<?php
	session_start();
	$link=mysqli_connect("localhost","rayhomep_users","66666mxr","rayhomep_users");
	if (mysqli_connect_error()) {
		die("Could not connect to database");
	}
	$email = $_POST["email"];
	$password = $_POST["password"];
	if($_COOKIE["email"]==""){
		if(!$_POST["email"]){
			$error.="<br/>Please enter your email";
		}else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			$error.="<br/>Please enter a valid email address";
		}
		if(!$_POST["password"]){
			$error.="<br/>Please enter your password";
		}else{
			if(strlen($_POST["password"])<8){
				$error.="<br/>Please enter password with at least 8 charactors";
			}
			if(!preg_match('`[A-Z]`',$_POST['password'])){
				$error .="<br/>Please include at least one capital letter in your password.";
			}
			
		}
		if($error){
			setcookie("email", "", time()-3600);
			echo $error='<div class="alert alert-danger"><strong>There were error(s) in your signup details:</strong>'.$error.'</div>';
		}else{
				
				$query="SELECT* FROM users WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
				$result= mysqli_query($link, $query);
				$results=mysqli_num_rows($result);
				if($results){
					echo $error='<div class="alert alert-danger">That\'s email address is already registered. Do you want to log in?</div>';
					
				}else{
					$query = "INSERT INTO `users` (`email`,`password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";
					//mysqli_query($link, $query);
					if(mysqli_query($link, $query)){
						echo '<div class="alert alert-success">Welcome '.$_POST["email"]. ' <br/>Your sign up successful</div>';
					}else{
						setcookie("email", "", time()-3600);
						echo '<div class="alert alert-danger">Your sign up failed</div>';
						
					}
					//$_SESSION['id']=mysqli_insert_id($link);
					//print_r($_SESSION);
					// Redirect to logged in page.
				}
			}
		}else{
			setcookie("email", "", time()-3600);
			echo "<div class='alert alert-danger newAck'>You already have logged in an account, please log out it first before you sign up a new account.</div>";
			//echo "<div class='alert alert-danger newAck'>You've already logged in an account (".$_COOKIE['email'].").  Please <strong><a href='logOut.php'>log out</a></strong> first</div>";
			
		}		
	
	/*if($_POST["submit"]=="Log In"){
		$loginEmail=($_POST["loginEmail"]);
		$loginEmail=mysqli_real_escape_string($link, $loginEmail);
		$loginPassword=($_POST["loginPassword"]);
		$mmd5=md5($loginEmail.$loginPassword);
		$mmd5=md5($mmd5);
		$query = "SELECT* FROM `users` WHERE email='$loginEmail' AND password = '$mmd5' LIMIT 1";
		$result=mysqli_query($link , $query) ;
		$row =mysqli_fetch_array($result) ;
		print_r($row);
	}*/
	
?>