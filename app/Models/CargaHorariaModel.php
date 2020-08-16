<?php

namespace App\Models;

use App\Entities\CargaHoraria;
use CodeIgniter\Model;

class CargaHorariaModel extends Model
{
    protected $table = 'carga_horaria';

    protected $primaryKey = 'usuario_id';

    protected $returnType = CargaHoraria::class;
    
    protected $allowedFields = [
        'usuario_id',
        'semana',
        'sabado',
        'domingo',
        'data_inicio',
        'saldo_inicio',
    ];
}