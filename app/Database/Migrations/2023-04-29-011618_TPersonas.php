<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TPersonas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'telefono' => [
                'type' => 'INT',
                'constraint' => '255',
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'usuario',
            ],
            'usuario' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('personas');
    }

    public function down()
    {
        $this->forge->dropTable('personas');
    }
}
