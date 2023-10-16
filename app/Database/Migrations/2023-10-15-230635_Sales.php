<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => TRUE
            ],
            'price_amount' => [
                'type' => 'decimal',
                'constraint' => '10,2',
                'null' => false
            ],
            'users_id' => [
                'type' => 'int',
                'null' => false
            ],
            'products_id' => [
                'type' => 'int',
                'null' => false
            ],
            'status' => [
                'type' => 'varchar',
                'null' => false
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => false
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('users_id', 'users', 'id');
        $this->forge->addForeignKey('products_id', 'products', 'id');
        $this->forge->createTable('sales', true);
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
