<?php
declare(strict_types=1);


namespace App\Core


/**
 *	Class Configuration
 *	
 *	A class for reading and writing from and to the App configuration.
 */
Class Configuration {
	/**
	 *	@var array|null $config 
	 */
	private static $config;

	
	public static function load() {
		$configDir = getenv('WWW_ROOT') . "/config/";
	}


	/**
	 * 
	 *	@param string $var the path of the configuration (e.g. 'Datasources.default.username')
	 *	@param mixed $default the default value if var is not found
	 *
	 *	@return mixed the value at specified var or null
	 */
	public static function read(?string $var = null, $default = null) 
	{
		$keys = explode('.', $var);

		return array_reduce($keys, function ($carry, $key) {
			return is_array($carry) && isset($carry[$key]) ? $carry[$key] : null;
		}, self::$config) ?? $default;
	}
}
