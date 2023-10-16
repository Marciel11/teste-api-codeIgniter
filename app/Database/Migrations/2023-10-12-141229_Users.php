<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => TRUE
            ],
            'name_or_fantasy' => [
                'type' => 'varchar',
                'constraint' => 70,
                'null' => false
            ],
            'cpf_cnpj' => [
                'type' => 'varchar',
                'constraint' => 14,
                'null' => false
            ],
            'address' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'type_user' => [
                'type' => 'char',
                'constraint' => 2,
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
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
