<?php

namespace App\Services;

use App\Entities\CargaHoraria;
use App\Entities\Usuario;
use App\Models\CargaHorariaModel;
use App\Models\UsuarioModel;

class SalvarUsuarioService
{
    public static function salvar(array $dados)
    {
        $usuario = new Usuario($dados);
        
        $usuarioModel = new UsuarioModel();
        
        if ($usuario->id) {
            $usuarioModel->update($usuario->id, $usuario);
        } else {
            $usuario->id = $usuarioModel->insert($usuario);
        }

        return $usuario->id;
    }

    public static function salvarComCargaHoraria(array $dados)
    {
        $dados['saldo_inicio'] = $dados['saldo_inicio'] ?: '00:00';
        $dados['saldo_inicio'] = $dados['sinal_saldo_inicio'] . $dados['saldo_inicio'];

        $cargaHoraria = new CargaHoraria($dados);
        $idUsuario = self::salvar($dados);

        $existeCargaHoraria = !empty($cargaHoraria->usuario_id);
        $cargaHoraria->usuario_id = $idUsuario;

        $cargaHorariaModel = new CargaHorariaModel();

        if ($existeCargaHoraria) {
            $cargaHorariaModel->update($cargaHoraria->usuario_id, $cargaHoraria);
        } else {
            $cargaHorariaModel->insert($cargaHoraria);
        }
    }
}