<?php 

namespace App\Controllers;

use App\Services\SalvarUsuarioService;

class Usuario extends BaseController
{
    public function index()
    {
        $dadosView = session('dadosRequest') ?? [];

        return view('usuario', $dadosView);
    }
    
	public function salvar()
	{
        $dadosRequest = $this->request->getPost();

        if (!$this->validate('usuario')) {
            $erros = $this->validator->getErrors();
            
            return redirect()
                ->to('/usuario')
                ->with('dadosRequest', $dadosRequest)
                ->with('erros', $erros);
        }
            
        SalvarUsuarioService::salvarComCargaHoraria($dadosRequest);
        
        return redirect()
            ->to('/usuario')
            ->with('sucesso', "Usuário criado com sucesso!");
    }
}
