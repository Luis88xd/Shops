<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Cache;

class HomeController extends Controller{
    
	public function __construct(){
		
	}

	public function index(){
		$data['data_usuario'] = DB::table('Usuario')
		->select(DB::raw('usuNombre,usuApellido,usuTelefono,usuCorreo,usuFoto,usuFechaInicio'))
		->where('idUsuario',Cache::get('idUsuario'))
		->get();

		return view('Home/body',$data);
	}

	public function cuenta(){
		// $id = Cache::get('idUsuario');
		// $data['usuario'] = DB::table('SELECT * FROM Usuario JOIN Rol ON Rol.idRol = Usuario.idrol WHERE idUsuario = '.$id.'');
		$data['usuarios'] = DB::table('Usuario')->get();

		return view('Home/Cuenta/Body',$data);
	}
}
