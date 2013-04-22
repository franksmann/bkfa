<?php //--> 
/*
 * This file is part of the Eden package.
 * (c) 2011-2012 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

/**
 * Google Map Direction Class
 *
 * @package    Eden
 * @category   google
 * @author     Christian Symon M. Buenavista sbuenavista@openovate.com
 */
class Eden_Google_Maps_Direction extends Eden_Google_Base {
	/* Constants
	-------------------------------*/ 
	const URL_MAP_DIRECTION = 'http://maps.googleapis.com/maps/api/directions/json';
	
	/* Public Properties 
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_apiKey			= NULL;
	protected $_samples			= NULL;
	protected $_mode			= NULL;
	protected $_language 		= NULL;
	protected $_avoid 			= NULL;
	protected $_units 			= NULL;
	protected $_waypoints 		= NULL;
	protected $_alternatives	= NULL;
	protected $_departureTime	= NULL;
	protected $_arrivalTime		= NULL;
	protected $_region			= NULL;
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	public static function i() {
		return self::_getMultiple(__CLASS__);
	}
	
	/* Public Methods
	-------------------------------*/	
	/**
	 * Specifies the mode of transport to use when 
	 * calculating directions is driving.
	 *
	 * @return this
	 */
	public function setModeToDriving() {
		$this->_mode  = 'driving';
		
		return $this;
	}
	
	/**
	 * Specifies the mode of transport to use when 
	 * calculating directions is walking.
	 *
	 * @return this
	 */
	public function setModeToWalking() {
		$this->_mode  = 'walking';
		
		return $this;
	}
	
	/**
	 * Specifies the mode of transport to use when 
	 * calculating directions is bicycling.
	 *
	 * @return this
	 */
	public function setModeToBicycling() {
		$this->_mode  = 'bicycling';
		
		return $this;
	}
	
	/**
	 * Requests directions via public transit 
	 * routes. Both arrivalTime and departureTime are 
	 * only valid when mode is set to "transit".
	 *
	 * @return this
	 */
	public function setModeToTransit() {
		$this->_mode  = 'transit';
		
		return $this;
	}
	
	/**
	 * The language in which to return results.
	 *
	 * @param string|integer
	 * @return this
	 */
	public function setLanguage($language) {
		//argument 1 must be a string or integer	
		Eden_Google_Error::i()->argument(1, 'string', 'int');	
		
		$this->_language = $language;
		
		return $this;
	}
	
	/**
	 * Waypoints alter a route by routing it through the specified location(s)
	 *
	 * @param string|integer
	 * @return this
	 */
	public function setWaypoints($waypoint) {
		//argument 1 must be a string or integer	
		Eden_Google_Error::i()->argument(1, 'string', 'int');	
		
		$this->_waypoint = $waypoint;
		
		return $this;
	}
	
	/**
	 * The region code
	 *
	 * @param string|integer
	 * @return this
	 */
	public function setRegion($region) {
		//argument 1 must be a string or integer	
		Eden_Google_Error::i()->argument(1, 'string', 'int');	
		
		$this->_region = $region;
		
		return $this;
	}
	
	/**
	 * Set Distance to avoid tolls
	 *
	 * @return this
	 */
	public function setAvoidToTolls() {
		$this->_avoid  = 'tolls';
		
		return $this;
	}
	
	/**
	 * Set Distance to avoid highways
	 *
	 * @return this
	 */
	public function setAvoidToHighways() {
		$this->_avoid  = 'highways';
		
		return $this;
	}
	
	/**
	 * Returns distances in miles and feet.
	 *
	 * @return this
	 */
	public function setUnitToImperial() {
		$this->_units  = 'imperial';
		
		return $this;
	}
	
	/**
	 * Specifies that the Directions service may 
	 * provide more than one route alternative in the response.
	 *
	 * @return this
	 */
	public function setAlternatives() {
		$this->_Alternatives  = 'true';
		
		return $this;
	}
	
	/**
	 * Specifies the desired time of departure for transit directions as seconds
	 * -timespamp
	 *
	 * @param string|int
	 * @return this
	 */
	public function setDepartureTime($departureTime) {
		//argument 1 must be a string or integer
		Eden_Google_Error::i()->argument(1, 'string', 'int');
		
		$this->_departureTime = $departureTime;
		
		return $this;
	}
	
	/**
	 * specifies the desired time of arrival for transit directions as seconds
	 * -timespamp
	 *
	 * @param string|int
	 * @return this
	 */
	public function setArrivalTime($arrivalTime) {
		//argument 1 must be a string or integer
		Eden_Google_Error::i()->argument(1, 'string', 'int');
		
		$this->_arrivalTime = $arrivalTime;
		
		return $this;
	}
	
	/**
	 * Returns calculated directions between locations
	 *
	 * @param string|integer|float The address or textual latitude/longitude value from which you wish to calculate directions
	 * @param string|integer|float The address or textual latitude/longitude value from which you wish to calculate directions
	 * @param booelean  Indicates whether or not the directions request comes from a device with a location sensor
	 * @return array
	 */
	public function getDirection($origin, $destination, $sensor = 'false') {
		//argument test
		Eden_Google_Error::i()
			->argument(1, 'string', 'int', 'float')		//argument 1 must be a string, integer or float
			->argument(2, 'string', 'int', 'float')		//argument 2 must be a string, integer or float
			->argument(3, 'string');					//argument 3 must be a string	
			
		//populate paramenter
		$query = array(
			'origin'		=> $origin,			
			'sensor'		=> $sensor,	
			'destination'	=> $destination,	
			'alternatives'	=> $this->_alternatives,	//optional
			'region'		=> $this->_region,			//optional
			'departureTime'	=> $this->_departureTime,	//optional
			'arrivalTime'	=> $this->_arrivalTime,		//optional
			'language'		=> $this->_language,		//optional
			'avoid'			=> $this->_avoid,			//optional
			'units'			=> $this->_units);			//optional
		

		return $this->_getResponse(self::URL_MAP_DIRECTION, $query);
	}
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}