<?php

namespace App\Models;

use App\Entities\Usuario;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';

    protected $returnType = Usuario::class;
    
    protected $allowedFields = [
        'nome',
        'email',
        'senha',
    ];

    public function buscarPorEmail(string $email)
    {
        return $this->builder()
            ->where('email', $email)
            ->get()
            ->getFirstRow();
    }
}