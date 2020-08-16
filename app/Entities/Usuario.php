<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property bool $admin
 */
class Usuario extends Entity
{
    protected $attributes = [
        'id' => null,
        'nome' => null,
        'email' => null,
        'senha' => null,
        'admin' => null,
    ];

    protected $casts = [
        'id' => 'integer',
        'admin' => 'boolean',
    ];

    public function setSenha(string $senha)
    {
        $this->attributes['senha'] = password_hash($senha, PASSWORD_BCRYPT);

        return $this;
    }
}