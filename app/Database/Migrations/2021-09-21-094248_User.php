<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'user_id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'username' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => 200,
      ],
      'role' => [
        'type' => 'INT',
        'constraint' => 3
      ],
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'
    ]);

    $this->forge->addKey('user_id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
