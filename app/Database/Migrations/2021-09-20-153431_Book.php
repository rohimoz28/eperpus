<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'book_id'          => [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'book_title'       => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
      ],
      'book_image'       => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
      ],
      'category_id' => [
        'type' => 'INT',
        'constraint' => 5,
      ],
      'book_writer' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'book_publisher' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'book_date_publish' => [
        'type' => 'VARCHAR',
        'constraint' => '100',
      ],
      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'
    ]);
    $this->forge->addKey('book_id', true);
    $this->forge->createTable('books');
  }

  public function down()
  {
    $this->forge->dropTable('books');
  }
}
