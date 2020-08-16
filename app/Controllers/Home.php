<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session('usuario.admin')) {
			return view('admin_home');
		}

		return redirect()->to('/ponto');
	}
}
