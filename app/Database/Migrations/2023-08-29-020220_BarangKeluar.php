<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_keluar' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kode_barang_keluar' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_barang' => [
                'type' => 'INT',
            ],
            'tanggal' => [
                'type' => 'DATETIME',
            ],
            'jumlah' => [
                'type' => 'INT',
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
        $this->forge->addKey('id_barang_keluar', true);
        $this->forge->createTable('barang_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}
