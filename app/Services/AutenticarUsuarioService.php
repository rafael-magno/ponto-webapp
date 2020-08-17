<?php

namespace App\Services;

use App\Models\UsuarioModel;

class AutenticarUsuarioService 
{
    public static function autenticar(array $dados): bool
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->buscarPorEmail($dados['email']);

        if (!$usuario || !password_verify($dados['senha'], $usuario->senha)) {
            return false;
        }

        session()->set([
            'usuario' => [
                'id' => $usuario->id,
                'admin' => $usuario->admin,
                'menus' => BuscarMenusService::buscar($usuario->admin),
            ],
        ]);

        return true;
    }
}