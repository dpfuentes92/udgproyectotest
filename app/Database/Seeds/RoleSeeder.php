<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Administrador',
                'description' => 'Acceso total al sistema',
            ],
            [
                'name'        => 'Comité',
                'description' => 'Evaluadores de proyectos y tesis',
            ],
            [
                'name'        => 'Estudiante',
                'description' => 'Usuarios que suben sus proyectos',
            ],
            [
                'name'        => 'Visitante',
                'description' => 'Público general con acceso a proyectos aprobados',
            ],
        ];

        // Simple query
        $this->db->table('roles')->insertBatch($data);
    }
}
