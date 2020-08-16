<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * @property int $id
 * @property int $usuario_id
 * @property string $data
 * @property string $hora
 */
class Ponto extends Entity
{
    protected $attributes = [
        'id' => null,
        'usuario_id' => null,
        'data' => null,
        'hora' => null,
    ];

    protected $casts = [
        'id' => 'integer',
        'usuario_id' => 'integer',
    ];
}