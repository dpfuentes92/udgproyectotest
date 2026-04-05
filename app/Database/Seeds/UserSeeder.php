<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'role_id'    => 1, // Administrador
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'email'      => 'admin@udg.mx',
            'first_name' => 'Admin',
            'last_name'  => 'Sistema',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simple query
        $this->db->table('users')->insert($data);
    }
}
