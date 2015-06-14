<?php
    setcookie("x",rand(0,10),time()+60*60*24);
	setcookie("y",rand(0,10),time()+60*60*24);
	setcookie("total",$_COOKIE["x"]+$_COOKIE["y"],time()+60*60*24);
	/*$_COOKIE["x"] = rand(0,10);
	$_COOKIE["y"] = rand(0,10);
	$_COOKIE["total"] = $_SESSION["x"] + $_SESSION["y"];*/
	
	if($_POST["submit"]){
		$result ='<div class="alert alert-success">Form Submitted</div>';
		if(!$_POST["name"]){
			$error="<br />Please enter your name";
		}	
		if(!$_POST["email"]){
			$error.="<br />Please enter your email";
		}
		if(!$_POST["subject"]){
			$error.="<br />Please enter your subject";
		}
		if(!$_POST["comment"]){
			$error.="<br />Please enter your comment";
		}
		if($_POST["email"] !="" AND !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			$error.= "<br /> Please enter a valid email address";
		}
		if($_POST["answer"]==""){
			$error.= "<br /> Please enter verification number";
		}
		if($_POST["answer"]!="" AND $_COOKIE["total"] != (int)$_POST["answer"]){
		  $error.= "<br /> The verification number you entered is incorrect.";
	   }
		
		if($error){
			$result='<div class="alert alert-danger"><strong>There were error(s) in your form:</strong> '.$error.'</strong></div>';
		}else{
			$emailTo="2008mr@live.cn";
			$subject=$_POST["subject"];
			$body=  "Name: ".$_POST['name']."
			
			Email: ".$_POST['email']." 
			
			Comment: ".$_POST['comment'];
			if(mail($emailTo, $subject, $body)){
				$result='<div class="alert alert-success"><strong>Thank you! I\'ll be in touch.</strong> </strong></div>';
			}else{
				$result='<div class="alert alert-danger">Sorry, there was an error sending your massage. Please try it later.s</div>';
			};
		}
		
	}
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta charset = "utf-8">
        <meta name="viewport" content="width = device-width, intial-scale = 1">
        <meta name = "description" conent="">
        <meta name = "author" content="">
        <title>Contact</title>
        <link rel="icon" type="image/png" href="Img/ray.png" />
        <link href="CSS/index.css" rel="stylesheet" type="text/css" />
        <link href="CSS/contact.css" rel="stylesheet" type="text/css"/>
        <link href="Scripts/fancyBox/source/jquery.fancybox.css?v=2.1.5" rel="stylesheet" type="text/css"  media="screen"/>
        <link href="Scripts/fancyBox/source/helpers/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css"/>
        <link href="Scripts/fancyBox/source/helpers/jquery.fancybox-thumbs.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap -->
        <link href="CSS/3rdParty/bootstrap.min.css" rel="stylesheet" />
        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,400' rel='stylesheet' type='text/css'>
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    </head>
    <body onload="getNumber()">
        <header class="site-header" role="banner">
            <!-- navbar -->
            <div class="navbar-wrapper">
                <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" id="logo" href="home.html"><img src="Img/ray.png" alt="logo"  /></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="home.html">About Me</a></li>
                                <li><a href="education.html">Education</a></li>
                                <li><a href="hobbies.html">Hobbies</a></li>
                                <li><a href="idols.html">Idols</a></li>
                                <li class="active"><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Slides -->
        <section id="contactAnimate">
            <hr class="transition-timer-carousel-progress-bar">
            <div class="carousel slide" id="myCarousel" data-inerval="false" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item">
                        <img src="Img/westhaven.jpg" alt="westhaven" />
                    </div>
                    <div class="item">
                        <img src="Img/nightfall.jpg" alt="nightfall" />
                    </div>
                    <div class="item">
                        <img src="Img/city_night.jpg" alt="city_night" />
                    </div>
                    <div class="item">
                        <img src="Img/night.jpg" alt="night" />
                    </div>
                </div>
            </div>
        </section>
        
        <!-- contact -->
        <section id="contactForm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h3>GET IN TOUCH</h3>
                        <div class="ack"><?php echo $result; ?></div>
                        <form method="post" action = "" class="contactForm">
                            <div class="form-group name" >
                                <label for="name">Your Name *</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Your Name: " />
                            </div>
                            <div class="form-group email">
					           <label for="email">Your Email *</label>
					           <input id="email" type="email" name="email" class="form-control" placeholder="Your Email" />
				            </div>
                            <div class="form-group subject">
                                <label for="subject">Your Subject:</label>
                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Your Subject"/>
                            </div>
                            <div class="form-group comment">
                                <label for="comment">Your Comment:</label>
                                <textarea class="form-control" name="comment"></textarea>
                            </div>
                            <div class="form-group question">
                                <label for="numberA">Answer Question:</label>
                                <p><?=$_COOKIE["x"] ?>+<?=$_COOKIE["y"] ?> = </p>
                                <input type="text" name="answer"  class="form-control" />
                            </div>
                           <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="submitB" value="Submit" />
                            
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <div class="details">
                            <p class="info"><span><img id="s_address" src="Img/small-address.png" /></span>3G/ 32 Eden Crescent,<br/> Auckland CBD </p>
                            <br>
                            <p class="info"><span><img id="s_email" src="Img/small-email.png" /></span><a href="mailto: 2008mr@live.cn">2008mr@live.cn </a></p>
                            <br/>
                            <p class="info"><span><img id="s_phone" src="Img/small-phone.png" /></span> 02102782212</p>
                        </div>
                        <div class="yourVote">
                            <h3>Do you  like my website?</h3>
                            <form id="vote">
                                <div class="form-group">
                                    <label for="yes" name="yes">Yes:</label>
                                    <input class="group-control vote" type="radio" name="vote" value="0" onclick="getVote(this.value)" />                                       </div>
                                <div class="form-group">
                                    <label for="no" name="no">No:</label>
                                    <input class="group-control vote" type="radio" name="vote" value="1" onclick="getVote(this.value)" />
                                </div>
                            </form>
                            <div id="voteResult"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Map -->
        <section id="map">
            <div id="mapholder">\</div>
        </section>
        
        <!-- Refernce -->
        <div id="reference">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <fieldset>
                            <h3>Reference 1</h3>
                            <address>
                                Name: Rhys Wang
                                <br/>E-mail address: <a class="email" href="mailto: 2008mr@live.cn">RhysWa@datacom.co.nz</a>
                                <br/>Phone: 021 896 066
                                <br/>Relationship: Tutor
                            </address>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <form method="post">
                          <fieldset>
                                <h3>Reference 2</h3>
                                <address>
                                    Name: Reinhard Klette
                                    <br/>E-mail address: <a class="email" href="mailto: 2008mr@live.cn">r.klette@auckland.ac.nz</a>
                                    <br/>Phone: 02 177 5537
                                    <br/>Relationship: Professor
                                </address>
                        </fieldset>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <fieldset>
                            <h3>Reference 3</h3>
                            <address>
                                Name: Peter Shen
                                <br/>E-mail address: <a class="email" href="mailto: 2008mr@live.cn">peter@kadabra.co.nz</a>
                                <br/>Phone: 021 1342 840
                                <br/>Relationship: Manager
                            </address>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <section id="footer">
            <div class="container">
                <div class="row detail">
                    <div class="col-sm-4">
                        <img src="Img/address.png" alt="address">
                        <h4>Address</h4>
                        <p>32 Eden Crescent, Auckland CBD</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="Img/phone.png" alt="phone"/>
                        <h4>Phone Number</h4>
                        <p>02102782212</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="Img/email.png" alt="email">
                        <h4>Email Address</h4>
                        <p><a href="mailto: 2008mr@live.cn">2008mr@live.cn</p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="container second">
                <div class="row">
                    <div class="col-sm-3">
                        <p><a href="home.html" class="bottomlogo"><img src="Img/ray.png" alt="logo" /></a></p>
                    </div>
                    <div class="col-sm-6">
                        <nav>
                            <ul class="list-unstyled list-inline">
                                <li class="active"><a href="home.html">About Me</a></li>
                                <li><a href="education.html">Education</a></li>
                                <li><a href="hobbies.html">Hobbies</a></li>
                                <li><a href="idols.html">Idols</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-sm-3 right">
                        <div class="pull-right">&copy; 2015 Xianrui Meng</div>
                    </div>
                </div>   
            </div>
        </section>    
        <a href="#" class="scrollToTop"></a>
        <script src="Scripts/jquery-2.1.1.min.js"></script>
        <script src="Scripts/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
        <script src="Scripts/defaultSlide.js"></script>
        <script src="Scripts/geolocation.js" type="text/javascript"></script>
        <script src="Scripts/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <script src="Scripts/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <script src="Scripts/scroll.js" type="text/javascript"></script>
        <script src="Scripts/fancyBox/source/helpers/jquery.fancybox-buttons.js"></script>
        <script src="Scripts/fancyBox/source/helpers/jquery.fancybox-media.js"></script>
        <script src="Scripts/fancyBox/source/helpers/jquery.fancybox-thumbs.js"></script>
        <script src="Scripts/3rdParty/bootstrap.min.js"></script> 
        <script>
            $(document).ready(function(){
                var percent = 0,
                    bar = $(".transition-timer-carousel-progress-bar"),
                    crsl = $("#myCarousel");
                function progressBarCarousel(){
                    bar.css({width: percent+"%"});
                    percent = percent +0.5;
                    if(percent>100){
                        percent=0;
                        crsl.carousel("next");
                    }
                }
                crsl.carousel({
                    interval: false,
                    pause:true
                }).on("slid.bs.carousel", function(){ percent = 0;});
                var barInterval = setInterval(progressBarCarousel, 30);
                crsl.hover(
                    function(){
                        clearInterval(barInterval);
                    },
                    function(){
                        barInterval = setInterval(progressBarCarousel, 30);
                    }       
                );
            });
            function getVote(int){
                var xmlhttp;
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function(){    
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        document.getElementById("vote").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","phpHandler/poll_vote.php? vote=" + int, true);
                xmlhttp.send();
            }
        </script>
    </body>
       
</html>