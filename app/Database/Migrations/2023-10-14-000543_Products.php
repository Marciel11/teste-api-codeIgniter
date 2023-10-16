<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 70,
                'null' => false
            ],
            'description' => [
                'type' => 'varchar',
                'constraint' => 70,
                'null' => false
            ],
            'price' => [
                'type' => 'decimal',
                'constraint' => '10,2',
                'null' => false
            ],
            'amount' => [
                'type' => 'int',
                'null' => false
            ],
            'code' => [
                'type' => 'int',
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
        $this->forge->createTable('products', true);
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
