<?php

namespace App\Services;

class BuscarMenusService
{
    public static function buscar(bool $admin)
    {
        return $admin
            ? self::buscarMenusAdministrativos()
            : self::buscarMenusPonto();
    }

    public static function buscarMenusAdministrativos()
    {
        return [
            [
                'label' => 'Cadastrar usuário',
                'href' => 'usuario',
            ]
        ];
    }

    public static function buscarMenusPonto()
    {
        return [
            [
                'label' => 'Saldo consolidado',
                'href' => 'ponto',
            ],
            [
                'label' => 'Incluir ponto',
                'href' => 'ponto/incluir',
            ],
            [
                'label' => 'Histórico do ponto',
                'href' => 'ponto/historico',
            ],
        ];        
    }
}