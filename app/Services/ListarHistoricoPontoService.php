<?php

namespace App\Services;

use App\Helpers\Data;
use App\Helpers\Hora;
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
        $maximoRegistrosDia = 4;

        while ($dataLoopInt >= $dataInicioInt) {
            $data = date('Y-m-d', $dataLoopInt);
            $diaSemanaInt = date('w', $dataLoopInt);
            $cargaHorariaDia = $cargaHoraria->semana;

            if ($diaSemanaInt == 0) {
                $cargaHorariaDia = $cargaHoraria->domingo;
            } else if ($diaSemanaInt == 6) {
                $cargaHorariaDia = $cargaHoraria->sabado;
            }

            $totalTrabalhado = $registrosPorDia[$data]['totalTrabalhado'] ?? 0;
            $saldoInt = $totalTrabalhado - Hora::paraMinutos($cargaHorariaDia);
            $saldo = $saldoInt ? Hora::saldoParaHoraMinuto($saldoInt) : '';

            $detalhamentoPorDia[$data] = [
                'dia' => Data::diaSemana($diaSemanaInt) . ', ' . date('d/m', $dataLoopInt),
                'registros' => $registrosPorDia[$data]['registros'] ?? [],
                'saldoInt' => $saldoInt,
                'saldo' => $saldo,
            ];

            $totalRegistrosDia = count($detalhamentoPorDia[$data]['registros']);
            $maximoRegistrosDia = $maximoRegistrosDia > $totalRegistrosDia 
                ? $maximoRegistrosDia
                : $totalRegistrosDia;
            
            $dataLoopInt = strtotime('-1 day', $dataLoopInt);
        }

        return [
            'detalhamentoPorDia' => $detalhamentoPorDia,
            'maximoRegistrosDia' => $maximoRegistrosDia % 2 ? $maximoRegistrosDia + 1 : $maximoRegistrosDia,
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
            $registrosPorDia[$data]['registros'][] = date('H:i', strtotime($registroPonto->hora));
            
            $registrosDia = $registrosPorDia[$data]['registros'];
            $totalRegistrosDia = count($registrosDia);
            
            if ($totalRegistrosDia % 2 === 0) {
                $totalTrabalhado = $registrosPorDia[$data]['totalTrabalhado'] ?? 0;
                $totalTrabalhado += Hora::paraMinutos($registrosDia[$totalRegistrosDia - 1]);
                $totalTrabalhado -= Hora::paraMinutos($registrosDia[$totalRegistrosDia - 2]);
                $registrosPorDia[$data]['totalTrabalhado'] = $totalTrabalhado;
            }
        }

        return $registrosPorDia;
    }
}