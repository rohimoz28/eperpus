<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'rent_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'member_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ],
            'book_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'date_borrow' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'date_return' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'late' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'book_fine_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ],
            'late_fine' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'sum_fine' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'book_status' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addKey('rent_id', true);
        // $this->forge->addForeignKey('id_member', 'members', 'member_id');
        // $this->forge->addForeignKey('id_book', 'books', 'book_id');
        $this->forge->createTable('rents');
    }

    public function down()
    {
        $this->forge->dropTable('rents');
    }
}
