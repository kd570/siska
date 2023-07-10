<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jb' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jb' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_bg' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'tingkatan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'des_jb' => [
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
        $this->forge->addKey('id_jb', true);
        $this->forge->addForeignKey('id_bg', 'bagian', 'id_bg');
        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        $this->forge->dropForeignKey('jabatan', 'jabatan_id_bg_foreign');
        $this->forge->dropTable('jabatan');
    }
}
