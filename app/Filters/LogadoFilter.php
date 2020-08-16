<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LogadoFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('usuario')) {
            return redirect()->to('/autenticacao');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {        
    }
}