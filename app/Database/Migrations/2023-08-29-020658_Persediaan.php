<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Persediaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_persediaan' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'INT',
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
        $this->forge->addKey('id_persediaan', true);
        $this->forge->createTable('persediaan');
    }

    public function down()
    {
        $this->forge->dropTable('persediaan');
    }
}
