<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AreaAset extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aset' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_pemilik' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_uk' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kota' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kelurahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'j_sertifikat' => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'no_sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_terbit' => [
                'type'       => 'DATE',
                'NULL' => TRUE,
            ],
            'tgl_expire' => [
                'type'       => 'DATE',
                'NULL' => TRUE,
            ],
            'guna' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'luas' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'des_aset' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'file'       => [
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
        $this->forge->addKey('id_aset', true);
        $this->forge->createTable('area_aset');
    }

    public function down()
    {
        $this->forge->dropTable('area_aset');
    }
}
