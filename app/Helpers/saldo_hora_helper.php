<?php

function getClassText(string $saldo): string
{
    $sinal = substr($saldo, 0, 1);
    
    return $sinal === '+' 
          ? 'text-success' 
          : ($sinal === '-' ? 'text-danger' : '');
}