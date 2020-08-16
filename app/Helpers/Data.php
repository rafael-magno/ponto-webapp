<?php

namespace App\Helpers;

class Data 
{
    public static function diaSemana(int $w)
    {
        $diasSemana = [
            'Domingo',
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira',
            'Sabado',
        ];

        return $diasSemana[$w];
    }
}