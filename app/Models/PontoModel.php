<?php

namespace App\Models;

use App\Entities\Ponto;
use CodeIgniter\Model;

class PontoModel extends Model
{
    protected $table = 'ponto';

    protected $returnType = Ponto::class;
    
    protected $allowedFields = [
        'usuario_id',
        'data',
        'hora',
    ];

    public function totalRegistrosPorUsuarioData($usuarioId, $data)
    {
        return $this->builder()
            ->where('usuario_id', $usuarioId)
            ->where('data', $data)
            ->orderBy('hora')
            ->countAllResults();
    }

    public function listarPorUsuarioIntervaloData($usuarioId, $dataInicio, $dataFim)
    {
        return $this->builder()
            ->where('usuario_id', $usuarioId)
            ->where('data >=', $dataInicio)
            ->where('data <=', $dataFim)
            ->orderBy('data', 'desc')
            ->orderBy('hora')
            ->get()
            ->getResult();
    }
}