<?php

// namespace App\Http\Helpers;

class Functions
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function menu(){
		$data['menu'] = DB::table('Menu')->where('idGrupo','2')->where('idTipoMenu','2')->get();
	}
}
?>