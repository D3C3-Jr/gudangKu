<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_barang' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'jenis_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->addKey('id_jenis_barang', true);
        $this->forge->createTable('jenis_barang');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_barang');
    }
}
