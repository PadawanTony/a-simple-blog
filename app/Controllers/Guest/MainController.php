<?php
namespace App\Controllers\Guest;

use App\Controllers\Controller;

class MainController extends Controller
{
	public function home()
	{
		return $this->view('home');
	}

	public function about()
	{
		return $this->view('about');
	}

	public function contact()
	{
		return $this->view('contact');
	}

	public function gallery()
	{
		return $this->view('gallery');
	}

	public function single()
	{
		return $this->view('single');
	}
}