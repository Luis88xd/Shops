<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Cache;

class UsuarioController extends Controller
{
    public function index(){
        $data['menu'] = DB::table('Menu')->where('idGrupo','3')->get();
        // $data['campos'] = DB::table('CUsuario')->orderBy('orden')->get();
    	return view("Ajustes/Usuarios/Body",$data);
    }

    // Listar todos los usuarios
    public function listarUsuarios(){
    	$query = DB::table('Usuario')->get();
    	return $query;
    }

    // Obtener un usuario en especifico
    public function obtenerUsuario(Request $request){
    	$id = $request->input('idUsuario');
    	$query = DB::table('Usuario')->where('idUsuario',$id);
    	if($query->count() > 0){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    // Agregar nuevo usuario
    public function agregarUsuario(Request $request){
        $image = $request->file('target');
        
        $math = rand(1,1000);
        $name = time().$math.'_'.$image->getClientOriginalName();
        $destinationPath = public_path('/uploads/products');
        $image->move($destinationPath, $name);

        // $request->add();

        $record = $request->all();
        $record = $request->except(['_token','target']);
        $query = DB::table('Usuario')->insert($record,['usuFoto' => $name]);
        if($query){
            return $this->listarUsuarios();
        }else{
            return false;
        }
    }

    // Actualizar Usuario
    public function actualizarUsuario(Request $request){
    	$id = $request->input('idUsuario');

    	$data = array(
    		'nombre'=>$request->input('nombre'),
    		'apellido'=>$request->input('apellido'),
    		'telefono'=>$request->input('telefono')
    	);

    	$query = DB::table('Usuario')->where('idUsuario',$id)->update($data);
    }

    // Eliminar usuario
    public function eliminarUsuario(Request $request){
        $id = $request->input('id');
        $query = DB::table('Usuario')->where('idUsuario',$id)->delete();
        if(json_encode($query)){
            return $this->listarUsuarios();
        }else{
            return false;
        }
    }
}
