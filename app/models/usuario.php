<?php
namespace App\Models;

use App\core\Model;

class Usuario extends Model {
    public function get_user_data()
    {
        return[
            'name'=>"Leonardo",
            'age'=>19,
            'email'=>'leoze@gmail.com'
        ];
    }
    public function testDb(){
        $sql = 'SELECT 1+2 AS teste';
        $resultado = $this->db->fetch($sql);
        return $resultado;
        
    }
}