<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {
        $password = password_hash("BostonCeltics", PASSWORD_DEFAULT);

        $data = [
            'nombre' => 'Jeronimo',
            'apellido' => 'Velez Rojas',
            'telefono' => '3154568769',
            'correo' => 'finnbalorjero5@gmail.com',
            'type' => 'superAdministrador',
            'usuario' => 'jvr',
            'password' => $password,
        ];

        // Using Query Builder
        $this->db->table('personas')->insert($data);
    }
}
