<?php

namespace App\Helpers;

class Hora 
{
    public static function paraMinutos(string $horaMinuto): int
    {
        list($hora, $minuto) = explode(':', $horaMinuto);

        return $minuto + ($hora * 60);
    }

    public static function paraHoraMinuto(int $minutos): string
    {
        $hora = floor($minutos / 60);
        $minuto = $minutos - ($hora * 60);

        $hora = str_pad($hora, 2, '0', STR_PAD_LEFT);
        $minuto = str_pad($minuto, 2, '0', STR_PAD_LEFT);
        
        return $hora . ':' . $minuto;
    }

    public static function saldoParaHoraMinuto(int $minutos): string
    {
        $sinal = '';
        if ($minutos !== 0) {
            $sinal = $minutos > 0 ? '+' : '-';
        }

        return $sinal . self::paraHoraMinuto(abs($minutos));
    }
}