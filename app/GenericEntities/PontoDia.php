<?php

namespace App\GenericEntities;

use App\Helpers\Hora;
use App\Traits\MagicGet;

/**
 * @property string[] $registros
 * @property int $totalTrabalhado
 */
class PontoDia
{
    use MagicGet;

    private $registros;
    private $totalTrabalhado;

    public function __construct()
    {
        $this->totalTrabalhado = 0;
        $this->registros = [];
    }

    public function adicionarRegistro(string $registro)
    {
        $this->registros[] = $registro;
        
        $totalRegistros = count($this->registros);
        if ($totalRegistros % 2 === 0) {
            $this->totalTrabalhado += Hora::paraMinutos($registro);
            $this->totalTrabalhado -= Hora::paraMinutos($this->registros[$totalRegistros - 2]);
        }
    }
}