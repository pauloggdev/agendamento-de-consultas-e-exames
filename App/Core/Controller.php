<?php
namespace App\Core;


class Controller
{


    public function view($view, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render($view . '.twig.php', $params);
    }
}
