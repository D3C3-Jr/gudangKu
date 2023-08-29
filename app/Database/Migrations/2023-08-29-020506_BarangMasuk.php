<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_masuk' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kode_barang_masuk' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_barang' => [
                'type' => 'INT',
            ],
            'id_supplier' => [
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
        $this->forge->addKey('id_barang_masuk', true);
        $this->forge->createTable('barang_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}
