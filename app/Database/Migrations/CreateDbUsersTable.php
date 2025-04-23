<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDbUsersTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'       => ['type' => 'INTEGER', 'auto_increment' => true],
        'username' => ['type' => 'TEXT', 'null' => false],
        'email'    => ['type' => 'TEXT', 'null' => false],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('db_users');
}

public function down()
{
    $this->forge->dropTable('db_users');
}

}
