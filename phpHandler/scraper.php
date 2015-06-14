<?php 
	$city = $_GET["city"];
	$city = str_replace(" ","",$city);
	
	$contents = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)</s',$contents,$matches);
	if(!$city){
		echo "<div class='alert alert-danger'>Please enter an city</div>";
	}else{
		if(!$matches[1]){
			echo "<div class='alert alert-danger'>Could not find weather data for that city. Please try again.</div>";
		}else{
			echo "<div class='alert alert-success'>".$matches[1]."</div>";
		}
	}
?>