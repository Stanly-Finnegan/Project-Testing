<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TodolistInitial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => '40',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('todolist_trs');
    }

    public function down()
    {
        $this->forge->dropTable('todolist_trs');
    }
}
