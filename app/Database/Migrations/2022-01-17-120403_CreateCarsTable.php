<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'           => 'INT',
                'constraint'     => '5',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'type'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'price'    => [
                'type'           => 'INT',
                'constraint'     => '64',
                'unsigned'       => true
            ],
            'total'    => [
                'type'           => 'INT',
                'constraint'     => '64',
                'unsigned'       => true
            ],
            'created_at'    => [
                'type'           => 'datetime',
                'null'           => true
            ],
            'updated_at'    => [
                'type'           => 'datetime',
                'null'           => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cars');
    }

    public function down()
    {
        $this->forge->dropTable('cars');
    }
}
