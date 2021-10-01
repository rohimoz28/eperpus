<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookFine extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'book_fine_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'book_fine' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('book_fine_id', true);
        $this->forge->createTable('book_fines');
    }

    public function down()
    {
        $this->forge->dropTable('book_fines');
    }
}
