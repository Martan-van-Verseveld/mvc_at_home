<?php
declare(strict_types=1);


namespace App\Controllers;

use App\Core\Controller;



/**
 *  SupercoolController
 */
class SupercoolController extends Controller
{
	public function index()
	{
		header("HTTP/1.1 404 Not Found");
	}
}
