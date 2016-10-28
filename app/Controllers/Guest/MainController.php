<?php
namespace App\Controllers\Guest;

use App\Controllers\Controller;

class MainController extends Controller
{
	public function home()
	{
		return $this->view('home');
	}
}