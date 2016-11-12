<?php
namespace App\Controllers\Guest;

use App\Controllers\Controller;
use App\Models\Post;
use Core\App;
use Core\Request;

class MainController extends Controller
{
	public function home()
	{
		$active['home'] = 1;

		$posts = App::get('database')->all(new Post);

		return $this->view('home', ['active'=>$active, 'posts'=>$posts]);
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

    public function showPost ()
    {
        // Get postID from URL
        $uriParts = explode('/', Request::uri());
        $postId = end($uriParts);

        // Get object from DB
        $post = App::get('database')->all(new Post, ['*'], ['id'=>$postId]);

        // Transform object to array
        $post = get_object_vars(current($post));

        $active['single'] = 1;

        return $this->view('single', ['active'=>$active, 'post'=>$post]);
	}
}