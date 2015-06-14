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
					$error.="<br/>Please enter password with at least 6 charactors";
				}
				if(!preg_match('`[A-Z]`',$_POST['password'])){
					$error .="<br/>Please include at least one capital letter in your password.";
				}
			}
			if($error){
				echo $error='<div class="alert alert-danger"><strong>There were error(s) in your signup details:</strong>'.$error.'</div>';
				
			}else{
				$query= "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $email)."'
						 AND password='".md5(md5($email).$password)."' LIMIT 1";
				
				$result = mysqli_query($link,$query);
				$row = mysqli_fetch_array($result);
				if($row){
					$_SESSION['id']=$row['id'];
					//echo '<div class="alert alert-success"><strong>Welcome</strong> '.$_COOKIE["email"].' <a href="index.html?logOut=1">log out</a></div>';
					//echo $_COOKIE['email'];
					setcookie("email",$email,time()+60*60*24);
					echo "<div class='alert alert-success'> Welcome back ".$_POST["email"]." !"; 				
				}else{
					$query2 = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $email)."'
						 AND NOT password='".md5(md5($email).$password)."' LIMIT 1";
					$result2 = mysqli_query($link, $query2);
					$row2 = mysqli_fetch_array($result2);
					if($row2){
						setcookie("email","",time()-3600);
						echo "<div class='alert alert-danger'>Your password is uncorrected, please try again </div>";
					}else{
						echo "<div class='alert alert-danger'>I could not find a user with that email and password. Please try again or register new account.</div>";
					}
				}
			}
	}else{
		if($email==$_COOKIE["email"]){
			echo "<div class='alert alert-danger newAck'>You've already logged in this account.</div>";
		}else{
			echo "<div class='alert alert-danger newAck'>You've already logged in an account (".$_COOKIE['email'].").  Please <strong><a href='logOut.php'>log out</a></strong> first</div>";
		/*if($_GET['logout']==1){
			setcookie("email","",time()-3600*24);
			//echo "<div class='alert alert-success newAck'>You've been logged out.You can log in an new account now.</div>";
		}*/
		}
	}
?>	