<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomersTable extends Migration
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
            'name'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'phone'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '16',
                'unique'         => true
            ],
            'address'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
