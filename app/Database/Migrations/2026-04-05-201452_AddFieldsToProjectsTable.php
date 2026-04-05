<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToProjectsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('projects', [
            'keywords' => [
                'type' => 'TEXT',
                'after' => 'description'
            ],
            'area_conocimiento' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after' => 'keywords'
            ],
            'tipo_actividad' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after' => 'area_conocimiento'
            ],
            'asesor_nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after' => 'tipo_actividad'
            ],
            'folio' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
                'after' => 'asesor_nombre'
            ],
            'anexos_paths' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'file_path'
            ]
        ]);

        // Modificar columna status para incluir 'borrador' y 'enviado'
        $this->db->query("ALTER TABLE projects MODIFY COLUMN status ENUM('borrador', 'enviado', 'pendiente', 'en_revision', 'aprobado', 'rechazado') DEFAULT 'enviado'");
    }

    public function down()
    {
        $this->forge->dropColumn('projects', ['keywords', 'area_conocimiento', 'tipo_actividad', 'asesor_nombre', 'folio', 'anexos_paths']);
        $this->db->query("ALTER TABLE projects MODIFY COLUMN status ENUM('pendiente', 'en_revision', 'aprobado', 'rechazado') DEFAULT 'pendiente'");
    }

}
