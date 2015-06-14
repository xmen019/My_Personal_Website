<?php
	if($_COOKIE["email"]==""){
		echo "<div class='alert alert-danger'>You haven't logged in any account</div>";
	}else{
		setcookie("email", "", time()-3600);
		echo '<div class="alert alert-success">You logged out your account</div>';
	}
?>