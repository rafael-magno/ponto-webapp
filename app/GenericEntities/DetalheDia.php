<?php

namespace App\GenericEntities;

use App\Entities\CargaHoraria;
use App\Helpers\Data;
use App\Helpers\Hora;
use App\Traits\MagicGet;

/**
 * @property string[] $registros
 * @property int $dia
 * @property int $saldoInt
 * @property int $saldo
 */
class DetalheDia
{
    use MagicGet;

    private $registros;
    private $dia;
    private $saldoInt;
    private $saldo;

    public function __construct(
        CargaHoraria $cargaHoraria, 
        int $timestamp, 
        ?PontoDia $pontoDia = null
    ) {
        $diaSemanaInt = date('w', $timestamp);

        $this->dia = Data::diaSemana($diaSemanaInt) . ', ' . date('d/m/Y', $timestamp);
        $this->registros = is_null($pontoDia) ? [] : $pontoDia->registros;
        $this->calcularSaldo($cargaHoraria, $diaSemanaInt, $pontoDia);
    }

    public function calcularSaldo(
        CargaHoraria $cargaHoraria, 
        int $diaSemanaInt,
        ?PontoDia $pontoDia = null 
    ) {
        $cargaHorariaDia = $cargaHoraria->semana;

        if ($diaSemanaInt == 0) {
            $cargaHorariaDia = $cargaHoraria->domingo;
        } else if ($diaSemanaInt == 6) {
            $cargaHorariaDia = $cargaHoraria->sabado;
        }

        $totalTrabalhado = is_null($pontoDia) ? 0 : $pontoDia->totalTrabalhado;
        $this->saldoInt = $totalTrabalhado - Hora::paraMinutos($cargaHorariaDia);
        $this->saldo = $this->saldoInt ? Hora::saldoParaHoraMinuto($this->saldoInt) : '';
    }
}