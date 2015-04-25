<?php

class Weather {

	private $weather;

	
	/**
     * Get all weather info from $city
     *
     * @param string $city       	City of which you want to know the weather
     * @param string $state     	The state of that city
     */
	public function __construct($city,$state) {
		if( $this->weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$state) ){
			$this->weather = json_decode($this->weather,true);
		}else{
			throw new Exception("Error Processing Request", 1);
		}
		
	}

	/**
     * Get sunset time whit custom format
	 *
     * @param string $format     	Custom format for sunset time ( default = "H:i")
	 *
	 * @return string				Sunset time
	 *
	 */
	public function getSunset( $format = "H:i" ) {
		return date( $format, $this->weather['sys']['sunset']);
	}

	/**
     * Get sunrise time whit custom format
	 *
     * @param string $format     	Custom format for sunrise time ( default = "H:i")
	 *
	 * @return  string		     	Sunrise time
	 *
	 */
	public function getSunrise( $format = "H:i" ) {
		return date( $format, $this->weather['sys']['sunrise']);
	}
	
	/**
     * Get minimum Kelvin temperature
	 *
	 * @return float 				minimum Kelvin
	 */	
	public function getMinKel() {
		return $this->weather['main']['temp_min'];
	}
	
	/**
     * Get maximum Kelvin temperature
	 *
	 * @return float 				maximum Kelvin
	 */	
	public function getMaxKel() {
		return $this->weather['main']['temp_max'];
	}
	
	/**
     * Get actual Kelvin temperature
	 *
	 * @return float 				actual Kelvin
	 */	
	public function getActKel() {
		return $this->weather['main']['temp'];
	}
	
	/**
     * Get maximum Celsius temperature
	 *
	 * @return float 				minimum Celsius
	 */	
	public function getMinCels() {
		return $this->getMinKel() - 273.15;
	}
	
	/**
     * Get maximum Celsius temperature
	 *
	 * @return float 				maximum Celsius
	 */	
	public function getMaxCels() {
		return $this->getMaxKel() - 273.15;
	}
	
	/**
     * Get actual Celsius temperature
	 *
	 * @return float 				actual Celsius
	 */	
	public function getActCels() {
		return $this->getActKel() - 273.15;
	}
	
	/**
     * Get maximum Fahrenheit temperature
	 *
	 * @return float 				maximum Fahrenheit
	 */	
	public function getMinFar() {
		return $this->getMinCels() * 1.8 + 32;
	}
	
	/**
     * Get maximum Fahrenheit temperature
	 *
	 * @return float 				maximum Fahrenheit
	 */	
	public function getMaxFar() {
		return $this->getMaxCels() * 1.8 + 32;
	}
	
	/**
     * Get actual Fahrenheit temperature
	 *
	 * @return float 				actual Fahrenheit
	 */	
	public function getActFar() {
		return $this->getActCels() * 1.8 + 32;
	}
	
	/**
     * Get icon based on weather
     *
     * @return string 				Weather icon
	 *
	 */
	public function getWeatherIcon() {
		switch($this->weather['weather'][0]['icon']){

			case "01d":
				return "wi-day-sunny";
			
			case "01n":
				return "wi-night-clear";
				
			case "02n":
				return "wi-night-partly-cloudy";
			
			case "02d":
				return "wi-night-alt-cloudy";

			case "03d":
			case "03n":
				return "wi-cloudy";
			
			case "04d":
			case "04n":
				return "wi-cloudy";
				
			case "09d":
			case "09n":
				return "wi-rain";
				
			case "10d":
			case "10n":
				return "wi-rain-mix";

			case "11d":
			case "11n":
				return "wi-thunderstorm";
				
			case "11d":
				return "wi-day-snow";
				
			case "11n":
				return "wi-night-alt-snow";
				
			case "11d":
				return "wi-day-fog";
				
			case "11n":
				return "wi-night-fog";
				
			default:
				return "wi-alien";
		}
	}
	
	/**
     * Get wind direction
     *
     * @return int 				Wind direction
	 *
	 */
	public function getWindDeg() {
		return ((int)($this->weather['wind']['deg'] / 15))*15;
	}
	
	/**
     * Get wind speed based on belfast scale
     *
     * @return int 				Wind speed
	 *
	 */
	public function getWindSpeed() {
		$speed = $this->weather['wind']['speed'];
		
		if    ($speed < 0.3) 					return 0;
		elseif($speed > 0.3  AND $speed < 1.5)	return 1;
		elseif($speed > 1.5  AND $speed < 3.3) 	return 2;
		elseif($speed > 3.3  AND $speed < 5.5) 	return 3;
		elseif($speed > 5.5  AND $speed < 8.0) 	return 4;
		elseif($speed > 8.0  AND $speed < 10.8) return 5;
		elseif($speed > 10.8 AND $speed < 13.9) return 6;
		elseif($speed > 13.9 AND $speed < 17.2) return 7;
		elseif($speed > 17.2 AND $speed < 20.7) return 8;
		elseif($speed > 20.7 AND $speed < 24.5) return 9;
		elseif($speed > 24.5 AND $speed < 28.4) return 10;
		elseif($speed > 28.4 AND $speed < 32.6) return 11;
		elseif($speed > 32.6) 					return 12;
	}

	/**
     * Get latitude
     *
     * @return float 				latitude
	 *
	 */
	public function getLat() {
		return $this->weather['coord']['lat'];
	}

	/**
     * Get longitude
     *
     * @return float 				longitude
	 *
	 */
	public function getLon() {
		return $this->weather['coord']['lon'];
	}

	/**
     * Get pressure
     *
     * @return float 				pressure
	 *
	 */
	public function getPressure() {
		return $this->weather['main']['pressure'];
	}

	/**
     * Get sea level
     *
     * @return float 				sea level
	 *
	 */
	public function getSeaLevel() {
		return $this->weather['main']['sea_level'];
	}

	/**
     * Get ground level
     *
     * @return float 				ground level
	 *
	 */
	public function getGroundLevel() {
		return $this->weather['main']['grnd_level'];
	}

	/**
     * Get humidity
     *
     * @return int 				humidity
	 *
	 */
	public function getHumidity() {
		return $this->weather['main']['humidity'];
	}

	/**
     * Get raw information
     *
     * @return string 				Raw data
	 *
	 */
	public function getRaw() {
		return var_dump($this->weather);
	}

}

?>