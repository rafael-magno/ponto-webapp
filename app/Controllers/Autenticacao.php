<?php 

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Services\BuscarMenusService;

class Autenticacao extends BaseController
{
    public function index()
    {
        return view('login', [
            'email' => session('email')
        ]);
    }

	public function logar()
	{
        if (!$this->validate('autenticacao')) {
            return redirect()
                ->to('/autenticacao')
                ->with('erros', $this->validator->getErrors());
        }

        $dados = $this->request->getPost();

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->buscarPorEmail($dados['email']);

        if (!$usuario || !password_verify($dados['senha'], $usuario->senha)) {
            return redirect()
                ->to('/autenticacao')
                ->with('erros', ['E-mail e/ou senha inválidos.'])
                ->with('email', $dados['email']);
        }

        $nomes = explode(' ', trim($usuario->nome));

        session()->set([
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $nomes[0],
                'admin' => $usuario->admin,
                'menus' => BuscarMenusService::buscar($usuario->admin),
            ],
        ]);

        return redirect()->to('/');
    }

	public function sair()
	{
        session()->destroy();

        return redirect()->to('/autenticacao');
    }
}
