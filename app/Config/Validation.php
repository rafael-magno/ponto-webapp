<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $usuario = [
        'nome' => 'required',
        'email' => 'required|valid_email|is_unique[usuario.email,id,{id}]',
        'senha' => 'required',
		'confirmacao_senha' => 'required_with[senha]|matches[senha]',
        'semana' => 'required|valid_date[H:i]',
        'data_inicio' => 'required|valid_date[d/m/Y]',
	];

	public $autenticacao = [
        'email' => 'required|valid_email',
        'senha' => 'required',
    ];	
}
