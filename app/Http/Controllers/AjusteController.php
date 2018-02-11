<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjusteController extends Controller
{

    // Principal
    public function index(){
    	$data['menu'] = DB::table('Menu')->where('idGrupo','3')->get();
    	return view("Ajustes/Body",$data);
    }

    // Productos
    public function configurarProductos(){
        $data['ajustes'] = DB::table('Ajustes')->get(); /*Ajustes Generales*/
    	$data['menu'] = DB::table('Menu')->where('idGrupo','3')->get();
    	$data['ceproducto'] = DB::table('CEProducto')->orderby('cepOrden','asc')->get();
        $data['cdproducto'] = DB::table('CDProducto')->orderby('cdpOrden','asc')->get();
    	return view("Ajustes/Productos/Body",$data);
    }

    // Listar configuraciones
    public function listarConfiguracion(){
        $data[ 'ceproducto'] = DB::table('CEProducto')->orderby('cepOrden','asc')->get();
        $data['cdproducto'] = DB::table('CDProducto')->orderby('cdpOrden','asc')->get();
        return $data;
    }

// ----------------------- Encabezado -----------------------

    // Agregar nuevo campo
    public function agregarNuevoCampo(Request $request){

        // Obtener el orden
        $orden = DB::table('CEProducto')
        ->select('cepOrden')
        ->orderby('cepOrden','desc')
        ->limit('1')
        ->get();

        $set_orden = 1;

        foreach($orden as $rec){
            $set_orden = $rec->cepOrden + 1;
            break;
        }

        $data = "";

        $cTipoCampo = "";
        $tipoCampo = $request->input('tipoCampo');
        $nombre = $request->input('nombre');
        $alias = str_replace(' ', '_', strtolower($nombre));

        if($tipoCampo == "texto" || $tipoCampo == "select"){
            $cTipoCampo = "varchar";
        }else if($tipoCampo == "numerico"){
            $cTipoCampo == "int";
        }else{
            $cTipoCampo = "varchar";
        }

        if($request->input('opciones') != null){
            $data = array(
                'cepNombre'=>$request->input('nombre'),
                'cepAlias'=>$alias,
                'cepTipoCampo'=>$request->input('tipo'),
                'cepValue'=>$request->input('opciones'),
                'cepOrden'=>$set_orden,
                'cepEstado'=>'Activo',
                'cepCTipo'=>$cTipoCampo
            );
        }else{
            $data = array(
                'cepNombre'=>$request->input('nombre'),
                'cepAlias'=>$alias,
                'cepTipoCampo'=>$request->input('tipo'),
                'cepValue'=>$request->input('valor'), 
                'cepOrden'=>$set_orden,
                'cepEstado'=>'Activo',
                'cepCTipo'=>$cTipoCampo
            );
        }

        $id = DB::table('CEProducto')->insertGetId($data);

        if($id > 0){

            $con_tipo = "";

            if($cTipoCampo == "varchar" || $cTipocampo == "select" || $cTipoCampo == "relacion"){
                $con_tipo = "VARCHAR(255)";
            }else if($cTipoCampo == "numerico"){
                $con_tipo = "INT";
            }else if($cTipoCampo == "fecha"){
                $con_tipo = "DATE";
            }else if($cTipoCampo == "hora"){
                $con_tipo = "TIME";
            }else{
                $con_tipo = "VARCHAR(255)";
            }

            $query = DB::select('ALTER TABLE EncabezadoProducto ADD COLUMN '.$alias.' '.$con_tipo.';');
            $data = DB::table('CEProducto')->where('idCEProducto',$id)->get();
            return $data;

        }else{
            return "false";
        }
    }

    public function actualizarCampoEncabezado(Request $request){
        $estado = $request->input('cepEstado');
        $nombre = $request->input('cepNombre');
        $valor = $request->input('cepValue');
        $orden = $request->input('cepOrden');
        $id = $request->input('id');

        $data = $request->all();
        $data = $request->except('id','_token');

        for($x = 0; $x < count($estado); $x++){
            $data = array(
                'cepEstado' => $estado[$x],
                'cepNombre' => $nombre[$x],
                'cepValue' => $valor[$x],
                'cepOrden' => $orden[$x]
            );

            $idCEProducto = $id[$x];

            DB::table('CEProducto')->where('idCEProducto',$idCEProducto)->update($data);
        }

        return json_encode("true");
    }

    public function eliminarCampoEncabezado(Request $request){
        $id = $request->input('id');
        $query = DB::table('CEProducto')->where('idCEProducto',$id)->delete();

        if(json_encode($query)){
            $data['ceproducto'] = DB::table('CEProducto')->get();
            return $data;
        }else{
            return "false";
        }
    }


// ----------------------- Detalle -----------------------

    // Agregar Detalle
    public function agregarCampoDetalle(Request $request){
        $orden = DB::table('CDProducto')
        ->select('orden')
        ->orderby('orden','desc')
        ->limit('1')
        ->get();

        $set_orden = 1;

        foreach($orden as $rec){
            $set_orden = $rec->orden + 1;
            break;
        }

        $data = "";

        $cTipoCampo = "";
        $tipoCampo = $request->input('tipoCampo');

        if($tipoCampo == "texto" || $tipoCampo){
            $cTipoCampo = "varchar";
        }else if($tipoCampo == "numerico"){
            $cTipoCampo == "int";
        }else{
            $cTipoCampo = "varchar";
        }

        if($request->input('opciones') != null){
            $data = array(
                'nombre'=>$request->input('nombre'),
                'tipoCampo'=>$request->input('tipo'),
                '_value'=>$request->input('opciones'),
                'orden'=>$set_orden,
                'estado'=>'Activo',
                'cTipoCampo'=>$cTipoCampo
            );
        }else{
            $data = array(
                'nombre'=>$request->input('nombre'),
                'tipoCampo'=>$request->input('tipo'),
                '_value'=>$request->input('valor'), 
                'orden'=>$set_orden,
                'estado'=>'Activo',
                'cTipoCampo'=>$cTipoCampo
            );
        }

        $data = DB::table('CDProducto')->insert($data);
        
        return json_encode($data);
    }

    // Actualizar Detalle
    public function actualizarCampoDetalle(Request $request){
        $estado = $request->input('cdpEstado');
        $nombre = $request->input('cdpNombre');
        $valor = $request->input('cdpValue');
        $orden = $request->input('cdpOrden');
        $id = $request->input('id');

        $data = $request->all();
        $data = $request->except('id','_token');

        for($x = 0; $x < count($estado); $x++){
            $data = array(
                'cdpEstado' => $estado[$x],
                'cdpNombre' => $nombre[$x],
                'cdpValue' => $valor[$x],
                'cdpOrden' => $orden[$x]
            );

            $idCDProducto = $id[$x];

            DB::table('CDProducto')->where('idCDProducto',$idCDProducto)->update($data);
        }

        return json_encode("true!");
    }

    // Eliminar detalle
    public function eliminarCampoDetalle(Request $request){
        $id = $request->input('id');
        $query = DB::table('CDProducto')->where('idCDProducto',$id)->delete();

        if(json_encode($query)){
            $data['cdproducto'] = DB::table('CDProducto')->orderby('orden','asc')->get();
            return json_encode($data);
        }else{
            return "false";
        }
    }

    // ----------------------- Políticas -----------------------

    // Listar políticas
    public function listarPoliticas(){
        $query = DB::table('PoliticaProducto')
        ->select(DB::raw('PoliticaProducto.*,Usuario.usuNombre,Usuario.usuApellido'))
        ->join('Usuario','Usuario.idUsuario','=','PoliticaProducto.idAutor')
        ->get();

        echo json_encode($query);
    }

    // Agregar políticas
    public function agregarPolitica(Request $request){
        $data = array(
            'idAutor'=>$request->input('autor'),
            'ppTitulo'=>$request->input('titulo'),
            'ppDescripcion'=>$request->input('descripcion')
        );

        $query = DB::table('PoliticaProducto')->insert($data);

        if($query){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }

    // obtener la información de un registro
    public function editarPolitica(Request $request){
        $query = DB::table('PoliticaProducto')
                ->select(DB::raw('PoliticaProducto.*,Usuario.usuNombre,Usuario.usuApellido'))
                ->where('idPoliticaProducto',$request->input('id'))
                ->join('Usuario','Usuario.idUsuario','=','PoliticaProducto.idAutor');

        if($query){
            return $query->get();
        }else{
            return false;
        }
    }

    // Actualizar la información de un registro
    public function actualizarPolitica(Request $request){

        $id = $request->input('id');

        $data = array(
            'idAutor'=>$request->input('autor'),
            'ppTitulo'=>$request->input('titulo'),
            'ppDescripcion'=>$request->input('descripcion')
        );

        $query = DB::table('PoliticaProducto')->where('idPoliticaProducto',$id)->update($data);

        if($query->count() > 0){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }

    // Eliminar un registor de politicas
    public function eliminarPolitica(Request $request){
        $id = $request->input('id');

        $query = DB::table('PoliticaProducto')->where('idPoliticaProducto',$id)->delete();
        if($query){
            return $this->listarPoliticas();
        }else{
            return false;
        }
    }
}