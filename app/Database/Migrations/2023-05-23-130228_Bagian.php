<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bagian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bg' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_bg' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_uk' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'des_bg' => [
                'type' => 'TEXT',
                'null' => true,
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
            ],
        ]);
        $this->forge->addKey('id_bg', true);
        $this->forge->addForeignKey('id_uk', 'unit_kerja', 'id_uk');
        $this->forge->createTable('bagian');
    }

    public function down()
    {
        $this->forge->dropForeignKey('bagian', 'bagian_id_uk_foreign');
        $this->forge->dropTable('bagian');
    }
}
