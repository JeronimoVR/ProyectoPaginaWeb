<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Encuesta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'N' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Pregunta1' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'Pregunta2' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'Pregunta3' => [
                'type'       => 'VARCHAR',
                'constraint' => '2',
            ],
            'Pregunta4' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'Pregunta5' => [
                'type'       => 'VARCHAR',
                'constraint' => '2',
            ]
        ]);
        $this->forge->addKey('N', true);
        $this->forge->createTable('encuesta');
    }

    public function down()
    {
        $this->forge->dropTable('encuesta');
    }
}
