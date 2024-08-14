<?php
declare(strict_types=1);


namespace App;

use App\Core\Controller;
use App\Core\Configuration;



/**
 *	Application is the main class for the whole MVC
 */
class Application
{
	/**
	 *	@var string|Controller $controller
	 */
	protected string|Controller $controller = "App\\Controllers\\HomeController";

	/**
	 *	@var string $method
	 */
	protected string $method = "index";

	/**
	 *	@var array $params
	 */
	protected array $params = [];

	/**
	 *	constructor of this class
	 *
	 *	@return
	 */
	public function __construct()
	{
		echo "<pre>"; print_r($_GET); echo "</pre>";
		$this->router();

		Configuration::load();
	}

	private function router()
	{
		$url = $this->parseUrl();
		
		$controllerClass = 'App\\Controllers\\' . ucfirst($url[0]) . 'Controller';
		if (class_exists($controllerClass)) {
			$this->controller = $controllerClass;
			unset($url[0]);
		}

		$this->controller = new $this->controller;
		print_r($this->controller);

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = array_values($url) ?? $this->params;

		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	
	/**
	 *	Function for parsing the url into the controller,
	 *	method and params.
	 *
	 *	@return Array
	 */
	public function parseUrl(): Array
	{
		if (isset($_GET['url'])) {
			$url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			return $url;
		}

		return [];
	}
}
