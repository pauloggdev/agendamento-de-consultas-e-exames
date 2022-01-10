<?php

namespace App\Http;

use App\Core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view('home', ["name" => "Paulo João"]);
    }
    public function error($data)
    {
        return $this->view("error", $data);
    }
}
