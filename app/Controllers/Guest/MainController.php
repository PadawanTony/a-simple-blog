<?php
namespace App\Controllers\Guest;

use App\Controllers\Controller;

class MainController extends Controller
{
	public function home()
	{
		$active['home'] = 1;

		return $this->view('home', ['active'=>$active]);
	}

	public function about()
	{
		$active['about'] = 1;

		return $this->view('about', ['active'=>$active]);
	}

	public function contact()
	{
		$active['contact'] = 1;

		return $this->view('contact', ['active'=>$active]);
	}

	public function gallery()
	{
		$active['gallery'] = 1;

		return $this->view('gallery', ['active'=>$active]);
	}

	public function single()
	{
		$active['single'] = 1;

		return $this->view('single', ['active'=>$active]);
	}
}