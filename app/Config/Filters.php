<?php namespace Config;

use App\Filters\AdministrativoFilter;
use App\Filters\LogadoFilter;
use App\Filters\NaoAdministrativoFilter;
use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'logado' => LogadoFilter::class,
		'administrativo' => AdministrativoFilter::class,
		'nao_administrativo' => NaoAdministrativoFilter::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'logado' => [
				'except' => ['autenticacao', 'autenticacao/*']
			],
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		'administrativo' => [
			'before' => ['usuario', 'usuario/*']
		],
		'nao_administrativo' => [
			'before' => ['ponto', 'ponto/*']
		],
	];
}
