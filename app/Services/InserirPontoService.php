<?php

namespace App\Services;

use App\Entities\Ponto;
use App\Models\PontoModel;

class InserirPontoService
{
    public static function inserir()
    {
        $ponto = new Ponto([
            'usuario_id' => session('usuario.id'),
            'data' => date('Y-m-d'),
            'hora' => date('H:i'),
        ]);
        
        $pontoModel = new PontoModel();
        $pontoId = $pontoModel->insert($ponto);

        return $pontoId;
    }
}