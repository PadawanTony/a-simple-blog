<?php
namespace App\Controllers;

use Core\App;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

abstract class Controller
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $viewsBasePath = '/../Views/';

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.$this->viewsBasePath);

        $this->twig = new Twig_Environment($loader, [
            'debug' => App::get('config.app')['debug'],
            'cache' => App::get('config.app')['storage.cache'],
        ]);

        if (App::get('config.app')['debug'])
        {
            $this->twig->addExtension(new Twig_Extension_Debug());
        }
    }

    public function view($twig, array $data = [])
    {
        $twig = str_replace('.', '/', $twig);

        return $this->twig->render($twig.'.twig', $data);
    }
}