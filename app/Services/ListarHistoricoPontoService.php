<?php

namespace App\Services;

use App\GenericEntities\DetalheDia;
use App\GenericEntities\PontoDia;
use App\Models\CargaHorariaModel;
use App\Models\PontoModel;

class ListarHistoricoPontoService
{
    public static function listar(
        ?string $dataInicio = null, 
        ?string $dataFim = null, 
        ?string $usuarioId = null
    ) {
        $usuarioId ??= session('usuario.id');
        $cargaHorariaModel = new CargaHorariaModel();
        $cargaHoraria = $cargaHorariaModel->find($usuarioId);

        $dataInicio ??= date('Y-m-d', strtotime('-31 days'));
        $dataInicio = strtotime($dataInicio) < strtotime($cargaHoraria->data_inicio)
            ? $cargaHoraria->data_inicio
            : $dataInicio;
        $dataFim ??= date('Y-m-d');
        
        $pontoModel = new PontoModel();
        $registrosPonto = $pontoModel->listarPorUsuarioIntervaloData($usuarioId, $dataInicio, $dataFim);
        $registrosPorDia = self::agrupaRegistrosPorDia($registrosPonto);
        
        $dataLoopInt = strtotime($dataFim);
        $dataInicioInt = strtotime($dataInicio);
        $detalhamentoPorDia = [];

        while ($dataLoopInt >= $dataInicioInt) {
            $data = date('Y-m-d', $dataLoopInt);
            $pontoDia = $registrosPorDia[$data] ?? null;

            $detalhamentoPorDia[] = new DetalheDia($cargaHoraria, $dataLoopInt, $pontoDia);
            
            $dataLoopInt = strtotime('-1 day', $dataLoopInt);
        }

        return [
            'detalhamentoPorDia' => $detalhamentoPorDia,
            'periodo' => date('d/m/Y', strtotime($dataInicio)) . ' - '. date('d/m/Y', strtotime($dataFim)),
            'dataMinima' => date('d/m/Y', strtotime($cargaHoraria->data_inicio)),
            'saldoInicio' => $cargaHoraria->saldo_inicio,
        ];
    }

    private static function agrupaRegistrosPorDia($registrosPonto)
    {
        $registrosPorDia = []; 
        
        foreach ($registrosPonto as $registroPonto) {
            $data = $registroPonto->data;
            $registrosPorDia[$data] = $registrosPorDia[$data] ?? new PontoDia();
            $registrosPorDia[$data]->adicionarRegistro(date('H:i', strtotime($registroPonto->hora)));
        }

        return $registrosPorDia;
    }
}