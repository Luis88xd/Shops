<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliticaController extends Controller
{
	
	function __construct()
	{

	}

	public function Politicas(){
		$data['menu'] = DB::table('Menu')->where('idGrupo','2')->get();
		return view('Inventario/Politicas/Body',$data);
	}

	public function listarPoliticas(){
            echo json_encode(DB::table('Politicas')
            ->select(DB::raw(
                'Politicas.idAutor,Politicas.polTitulo,Politicas.polDescripcion,Politicas.polFechaCreacion,Politicas.idPoliticas,
                Usuario.usuNombre,Usuario.usuApellido'
            ))
            ->join('Usuario','usuario.idUsuario','=','Politicas.idAutor','LEFT')
            ->get());
    }

    public function editarPoliticas(Request $request){
        $data = array(
           'idPoliticas'=>$request->input('id')
        );

        echo json_encode(DB::table('Politicas')->where($data)->get());
    }

    public function agregarPoliticas(Request $request){

        $data = array(
            'polTitulo'=>$request->input('titulo'),
            'polDescripcion'=>$request->input('descripcion'),
            'idAutor'=>$request->input('autor')
        );

        $record = DB::table('Politicas')->insert($data);

        if($record){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }

    public function actualizarPoliticas(Request $request){
        $data = array(
            'polTitulo'=>$request->input('titulo'),
            'polDescripcion'=>$request->input('descripcion')
        );

        $id = $request->input('id');

        $query = DB::table('Politicas')->where('idPoliticas',$id)->update($data);

        if($query){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }

    public function eliminarPoliticas(Request $request){
        $id = $request->input('id');
        $query = DB::table('Politicas')->where('idPoliticas',$request->input('id'))->delete();

        if($query){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }
}
?>