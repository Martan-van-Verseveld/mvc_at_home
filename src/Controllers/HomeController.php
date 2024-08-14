<?php
declare(strict_types=1);


namespace App\Controllers;

use App\Core\Controller;



class HomeController extends Controller
{
	public function index()
	{
		$this->view('home/index');
	}

	public function login(string $username)
	{
		$this->view('home/login');
	}
}
