<?php

namespace App\Entities;

use App\Helpers\Hora;
use CodeIgniter\Entity;

/**
 * @property int $usuario_id
 * @property string $semana
 * @property string $sabado
 * @property string $domingo
 * @property string $data_inicio
 * @property int $saldo_inicio
 */
class CargaHoraria extends Entity
{
    protected $attributes = [
        'usuario_id' => null,
        'semana' => null,
        'sabado' => null,
        'domingo' => null,
        'data_inicio' => null,
        'saldo_inicio' => null,
    ];

    protected $casts = [
        'usuario_id' => 'integer',
        'saldo_inicio' => 'integer',
    ];

    public function setDataInicio(string $dataInicio)
    {
        list($dia, $mes, $ano) = explode('/', $dataInicio);
        
        $this->attributes['data_inicio'] = $ano . '-' . $mes . '-' . $dia;

        return $this;
    }

    public function setSaldoInicio(string $saldoInicio)
    {
        $sinal = substr($saldoInicio, 0, 1);
        $saldoInt = Hora::paraMinutos(substr($saldoInicio, 1));
        
        $this->attributes['saldo_inicio'] = $sinal === '-'
            ? 0 - $saldoInt
            : $saldoInt ;

        return $this;
    }
}