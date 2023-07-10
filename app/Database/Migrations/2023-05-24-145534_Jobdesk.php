<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jobdesk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jd' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_jd' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_jd' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_jb' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'des_jd' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'file_jd'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
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
        $this->forge->addKey('id_jd', true);
        $this->forge->addForeignKey('id_jb', 'jabatan', 'id_jb');
        $this->forge->createTable('jobdesk');
    }

    public function down()
    {
        $this->forge->dropForeignKey('jobdesk', 'jobdesk_id_jb_foreign');
        $this->forge->dropTable('jobdesk');
    }
}
