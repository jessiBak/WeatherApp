<?php


$z = $_GET["zip"];

//regex for south africa: 4 digits
//regex for us: 5 digits
//regex for nigeria: 6 digits	
	
	
sleep(2);
$country = "";
//check for country
	$us =        preg_match("/^\d{5}$/i", $z, $matches);
	//$nigeria =   preg_match("/^\d{6}$/i", $z, $matches);//example zipcodes:105101, 560102Nigeria country code doesnt seem to work...
	/*openweathermap tech support: "In some countries, ZIP code databse isnt't consistent or may only be partial" :(*/
	$southAfrica = preg_match("/^\d{4}$/i", $z, $matches);//example zip codes: 6006, 8002
    if($us > 0)
	{
		$country = "us";
		
	}/*
	else if($nigeria > 0)
	{
		$country = "ng";
	}*/
	else if($southAfrica > 0)
	{
		$country = "za";
	}
	else//invalid zip or postal code
	{
	    exit();
	}
	
$url = "http://api.openweathermap.org/data/2.5/weather?zip=$z,$country&units=imperial&appid=[YOUR API KEY HERE]";
$fp = fopen($url , "r"); 

$contents = "";
while($more = fread( $fp, 1000)) 
{
   $contents .=  $more ;
}  
echo $contents ; 

?>
