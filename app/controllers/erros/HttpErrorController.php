<?php
namespace App\Controllers\Erros;

use App\Core\Controller;

class HttpErrorController extends Controller
{
    public function notFound()
    {
        http_response_code(404);
        $this->view('/Error/404');
    }
    public function InternalServerError () {
        http_response_code(500);
        $this->view('/Error/500');
    }
    public function Aunauthorized(){
        http_response_code(403);
        $this->view('/Error/403');
    }
}
