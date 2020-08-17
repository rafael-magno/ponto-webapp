<?php 

namespace App\Controllers;

use App\Services\AutenticarUsuarioService;

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

        if (!AutenticarUsuarioService::autenticar($dados)) {
            return redirect()
                ->to('/autenticacao')
                ->with('erros', ['E-mail e/ou senha inválidos.'])
                ->with('email', $dados['email']);
        }

        return redirect()->to('/');
    }

	public function sair()
	{
        session()->destroy();

        return redirect()->to('/autenticacao');
    }
}
