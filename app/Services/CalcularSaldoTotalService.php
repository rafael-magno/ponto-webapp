<?php

namespace App\Services;

use App\Helpers\Hora;

class CalcularSaldoTotalService
{
    public static function calcular()
    {
        $dataOntem = date('Y-m-d', strtotime('-1 day'));
        
        $historicoPonto = ListarHistoricoPontoService::listar(null, $dataOntem);

        $saldoDias = array_map(fn($dadosDia) => $dadosDia->saldoInt, $historicoPonto['detalhamentoPorDia']);

        $totalSaldo = $historicoPonto['saldoInicio'] + array_sum($saldoDias);

        return [
            'dataAte' => date('d/m/Y', strtotime($dataOntem)),
            'saldo' => Hora::saldoParaHoraMinuto($totalSaldo),
        ];
    }
}