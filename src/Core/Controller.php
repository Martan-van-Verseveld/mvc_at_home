<?php
declare(strict_types=1);


namespace App\Core;

use App\Core\Model;
use Exception;



/**
 *	Controller base class
 */
class Controller
{
	/**
	 *	@param string $name
	 *
	 *	@return Model|
	 */
	protected function model(string $name) {
		$modelClass = 'App\\Models\\' . ucfirst($name) . 'Model';
		if (class_exists($modelClass)) {
			return $modelClass;
		}

		throw new Exception("Model not found!");
	}

	/**
	 *	@param string $view
	 *	@param ?string $data
	 *	
	 *	@return 
	 */
	protected function view(string $view, ?array $data = null)
	{
		$view = explode('/', $view);

		$dir = dirname(__DIR__) . '/Views/' . ucfirst($view[0]) . '/';
		$file = $dir . $view[1] . '.php';

		require_once $file;
	}
}
