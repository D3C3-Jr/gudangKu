<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_departement' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kode_departement' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nama_departement' => [
                'type' => 'VARCHAR',
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
        $this->forge->addKey('id_departement', true);
        $this->forge->createTable('departement');
    }

    public function down()
    {
        $this->forge->dropTable('departement');
    }
}
