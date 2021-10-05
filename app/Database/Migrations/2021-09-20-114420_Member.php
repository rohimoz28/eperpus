<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Member extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'member_id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ],
      'name' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'gender' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'number' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'email' => [
        'type' => 'VARCHAR',
        'constraint' => 100
      ],
      'address' => [
        'type' => 'TEXT'
      ],
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'
    ]);
    $this->forge->addKey('member_id', true);
    $this->forge->createTable('members');
  }

  public function down()
  {
    $this->forge->dropTable('members');
  }
}
