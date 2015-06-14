<?php 
    setcookie("x", rand(0,10), time()+60*60*24); 
    setcookie("y", rand(0,10), time()+60*60*24);
    setcookie("total", $_COOKIE["x"]+$_COOKIE["y"], time()+60*60*24);
    echo  "dsfsdfs";
?>