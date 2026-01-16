<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/usuario.php';

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
