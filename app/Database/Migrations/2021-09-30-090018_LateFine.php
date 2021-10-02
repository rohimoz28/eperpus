<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LateFine extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'late_fine_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'rent_day' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'late_fine' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('late_fine_id', true);
        $this->forge->createTable('late_fines');
    }

    public function down()
    {
        $this->forge->dropTable('late_fines');
    }
}
