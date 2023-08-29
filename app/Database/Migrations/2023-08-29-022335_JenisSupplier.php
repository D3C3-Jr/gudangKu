<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisSupplier extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_supplier' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'jenis_supplier' => [
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
        $this->forge->addKey('id_jenis_supplier', true);
        $this->forge->createTable('jenis_supplier');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_supplier');
    }
}
