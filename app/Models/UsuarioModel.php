<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'codigo_institucional',
        'nombre_completo',
        'correo',
        'password_hash',
        'rol',
        'estado',
        'notif_frecuencia',
        'two_factor_secret',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'codigo_institucional' => 'required|is_unique[usuarios.codigo_institucional]',
        'correo' => 'required|valid_email|is_unique[usuarios.correo]|regex_match[/^[a-zA-Z0-9._%+-]+@(alumnos\.udg\.mx|docentes\.udg\.mx|udg\.mx)$/]',
        'nombre_completo' => 'required|min_length[3]|max_length[150]',
        'rol' => 'required|in_list[estudiante,comite,administrador,visitante]',
    ];
    
    protected $validationMessages   = [
        'correo' => [
            'is_unique' => 'Este correo institucional ya está registrado.',
            'regex_match' => 'El correo debe tener dominio institucional (@alumnos.udg.mx, @docentes.udg.mx o @udg.mx)'
        ],
        'codigo_institucional' => [
            'is_unique' => 'Este código ya ha sido registrado en el sistema.'
        ]
    ];
    protected $skipValidation       = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password_hash'])) {
            if (!str_starts_with($data['data']['password_hash'], '$2y$')) {
                $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_BCRYPT);
            }
        }
        return $data;
    }
}
