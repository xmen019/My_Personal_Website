<?php 
    $email = $_POST["email"];
    if($_COOKIE["email"]==""){
        echo "<div class='alert alert-danger' id='voteFail'>You haven't logged in. </div>";
    }else{
        include("table.php");
    }
?>