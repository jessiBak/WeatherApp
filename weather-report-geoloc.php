<?php

	$lat = $_GET["lat"];
	$lon = $_GET["lon"];	
	
	sleep(2);
	
	$url = "http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=imperial&appid=[YOUR API KEY HERE]";

	//5. Retrieve url response
	$fp = fopen ( $url , "r" ); 

	//6.  Convert response to string
	$contents = "";
	while($more = fread($fp, 1000)) 
	{
		$contents .=  $more;
	}  
	echo $contents; 

?>
