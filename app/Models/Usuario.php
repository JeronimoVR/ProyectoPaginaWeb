<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table      = 'personas';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'telefono', 'correo', 'usuario', 'password'];

    public function obtenerUsuario($data)
    {
        $Usuario = $this->db->table('personas');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    }
}
