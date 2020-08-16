<?php 

namespace App\Controllers;

use App\Models\PontoModel;
use App\Services\CalcularSaldoTotalService;
use App\Services\InserirPontoService;
use App\Services\ListarHistoricoPontoService;

class Ponto extends BaseController
{

    public function index()
    {
        helper('App\Helpers\saldo_hora');

        $dadosSaldoTotal = CalcularSaldoTotalService::calcular();

        return view('ponto', $dadosSaldoTotal);
    }

    public function historico($dataInicio = null, $dataFim = null)
    {
        helper('App\Helpers\saldo_hora');
        
        $historicoPonto = ListarHistoricoPontoService::listar($dataInicio, $dataFim);

        return view('historico_ponto', $historicoPonto);
    }

    public function incluir()
    {
        $pontoModel = new PontoModel();
        $registrosPonto = $pontoModel->listarPorUsuarioData(
            session('usuario.id'),
            date('Y-m-d')
        );

        $entradaSaida = count($registrosPonto) % 2
            ? 'Saída '
            : 'Entrada ';
        $entradaSaida .= floor(count($registrosPonto) / 2) + 1;

        return view('incluir_ponto', [
            'entradaSaida' => $entradaSaida,
            'horaAtual' => date('H:i:s'),
        ]);
    }

	public function salvar()
	{
        InserirPontoService::inserir();

        return redirect()
            ->to('/ponto/historico')
            ->with('sucesso', "Ponto registrado com sucesso!");
    }
}
