<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;



class Homecontroller extends Controller
{
    public function index()
    {
        $usuario = new Usuario();

        $data = $usuario->get_user_data();

        $this->view('/home/index', $data);
    }
    public function contact()
    {
        $this->view('/home/contact');
    }
};
