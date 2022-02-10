<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
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
            'customers_id'     => [
                'type'           => 'INT',
                'constraint'     => '5',
                'unsigned'       => true
            ],
            'cars_id'    => [
                'type'           => 'INT',
                'constraint'     => '5',
                'unsigned'       => true
            ],
            'start'    => [
                'type'           => 'date',
                'null'           => true
            ],
            'end'    => [
                'type'           => 'date',
                'null'           => true
            ],
            'status'    => [
                'type'           => 'ENUM',
                'constraint'     => ['pending', 'in_progress', 'done'],
                'default'        => 'pending',
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
        $this->forge->addForeignKey('customers_id', 'customers', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('cars_id', 'cars', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
