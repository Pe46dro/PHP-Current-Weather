<?php

include("../src/class.weather.php");

$venice = new Weather("Venice","IT");
?>
<html>
	<head>
		<title>PHP Weather</title>
		<link rel="stylesheet" href="css/weather-icons.min.css">
	</head>
	<body>
	
	<h2>getRaw():</h2>
	<pre><?=$venice->getRaw();?></pre>

	<h2>Sunset</h2>
	<p>Time:<?=$venice->getSunset()?></p>
	<p>Icon:<i class="wi wi-time-<?=$venice->getSunset("h")?>"></i></p>

	<h2>Sunrise</h2>
	<p>Time:<?=$venice->getSunrise()?></p>
	<p>Icon:<i class="wi wi-time-<?=$venice->getSunrise("h")?>"></i></p>

	<h2>Min Kelvin</h2> <?=$venice->getMinKel()?>
	<h2>Max Kelvin</h2> <?=$venice->getMaxKel()?>
	<h2>Actual Kelvin</h2> <?=$venice->getActKel()?>

	<h2>Min Celsius</h2> <?=$venice->getMinCels()?>
	<h2>Max Celsius</h2> <?=$venice->getMaxCels()?>
	<h2>Actual Celsius</h2> <?=$venice->getActCels()?>

	<h2>Min Fahrenheit</h2> <?=$venice->getMinFar()?>
	<h2>Max Fahrenheit</h2> <?=$venice->getMaxFar()?>
	<h2>Actual Fahrenheit</h2> <?=$venice->getActFar()?>

	<h2>WeatherIcon</h2>
	<i class="wi <?=$venice->getWeatherIcon()?>"></i>

	<h2>Wind Deg</h2>
	<p>Value:<?=$venice->getWindDeg()?></p>
	<p>Icon:<i class="wi wi-wind-default _<?=$venice->getWindDeg()?>-deg"></i></p>

	<h2>Wind Speed</h2>
	<p>Value:<?=$venice->getWindSpeed()?></p>
	<p>Icon:<i class="wi wi-beafort-<?=$venice->getWindSpeed()?>"></i></p>

	<h2>Latitude</h2> <?=$venice->getLat()?>
	<h2>Longitude</h2> <?=$venice->getLon()?>
	<h2>Pressure</h2> <?=$venice->getPressure()?>
	<h2>Sea Level</h2> <?=$venice->getSeaLevel()?>
	<h2>Humidity</h2> <?=$venice->getHumidity()?>

	</body>
</html>