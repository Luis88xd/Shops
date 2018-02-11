<?php

namespace App\Http\Controllers;

// use App\Http\Helpers\_Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller{
    public function index(){
        $GLOBALS['idDetalle'] = 0;
        $data['menu'] = DB::table('Menu')->where('idGrupo','2')->where('idTipoMenu','2')->get();
        $data['categorias'] = DB::table('Categoria')->get();
        $data['proveedores'] = DB::table('Proveedor')->get();
        $data['encabezados'] = DB::table('CEProducto')->where('cepEstado','Activo')->orderby('cepOrden')->get();
        $data['detalles'] = DB::table('CDProducto')->where('cdpEstado','Activo')->orderby('cdpOrden')->get();
        $data['politicas'] = DB::table('PoliticaProducto')->get();
    	return view('Inventario/Productos/Body',$data);
    }

    public function listarEncabezado(){

        $filter = DB::table('CEProducto')->where('cepEstado','Activo')->orderby('cepOrden');
        $filter_by = "";
        $count = $filter->count();


        $flag = 1;
        foreach($filter->get() as $f){

            if($flag <= 5){
                if($flag != 5){

                    if($f->cepAlias == 'encCategoria'){
                        $filter_by .= "catCategoria".",";
                    }else if($f->cepAlias == 'encProveedor'){
                        $filter_by .= 'proNombre'.",";
                    }else if($f->cepAlias == 'encAutor'){
                        $filter_by .= 'usuNombre'.",";
                    }else{
                        $filter_by .= $f->cepAlias.",";
                    }

                }else{

                    if($f->cepAlias == 'encCategoria'){
                        $filter_by .= "catCategoria".", idEncabezadoProducto";
                    }else if($f->cepAlias == 'encProveedor'){
                        $filter_by .= 'proNombre'.", idEncabezadoProducto";
                    }else if($f->cepAlias == 'encAutor'){
                        $filter_by .= 'usuNombre'.", idEncabezadoProducto";
                    }else{
                        $filter_by .= $f->cepAlias.", idEncabezadoProducto";
                    }
                }
            }

            $flag++;
        }

        $query = DB::table('view_encabezadoProducto')->select(DB::raw($filter_by))->get();
        return json_encode($query);
    }

    public function obtenerEncabezado(Request $request){
        $id = $request->input('id');

        $query['informacion'] = DB::table('view_encabezadoProducto')->where('idEncabezadoProducto',$id)->get();
        $query['galeria'] = DB::table('Galeria')->where('idEncabezadoProducto',$id)->get();

        return json_encode($query);

        // if($query->count() > 0){
        //     return json_encode($query);
        // }else{
        //     return "false";
        // }
    }

    public function agregarEncabezado(Request $request){

        $query = DB::select("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'DetalleProducto' AND table_schema = DATABASE( );");
        $id = 0;

        foreach($query as $rec){
            $id = $rec->AUTO_INCREMENT;
        }

        $data = $request->all();
        $data = $request->except(['_token','target']);
        $image = $request->file('target');
        $arreglo = array();
        $galeria = array();
        $orden = 0;
        
        for($x = 0;$x < count($image); $x++){
            $orden ++;
            $math = rand(1,1000);
            $name = time().$math.'_'.$image[$x]->getClientOriginalName();
            $destinationPath = public_path('/uploads/products');
            $image[$x]->move($destinationPath, $name);
            array_push($galeria,array(
                'galFoto'=>$name,
                'galOrden'=>$orden,
                'idEncabezadoProducto'=>$id
            ));
        }

        $query = DB::table('EncabezadoProducto')->insert($data);

        if($query){
           $query = DB::table('Galeria')->insert($galeria);
           if($query){
            return $this->listarEncabezado();
           }
        }else{
            return "false";
        }
    }

    public function obtenerEDetalle(Request $request){
        $id = $request->input('id');

        $query = DB::table('DetalleProducto')->where('idEncabezadoProducto',$id);

        if($query->count() > 0){
            return $query->get();
        }else{
            return "false";
        }
    }

    public function actualizarEncabezado(Request $request){

    }

    public function eliminarEncabezado(Request $request){
        $id = $request->input('id');

        $query = DB::table('view_encabezadoProducto')->where('idEncabezadoProducto',$id)->delete();
        
        if($query){
            return $this->listarEncabezado();
        }else{
            return "false";
        }
    }

// ------------------------------------------- Detalles ------------------------------------------------------------

     public function listarDetalles(Request $request){

        $filter = DB::table('CDProducto')->where('cdpEstado','Activo')->orderby('cdpOrden');
        $filter_by = "";
        $count = $filter->count();

        $flag = 1;
        foreach($filter->get() as $f){

            if($flag <= 5){
                if($flag != 5){

                    if($f->cdpAlias == 'detIdAutor'){
                        $filter_by .= 'usuNombre'.",";
                    }else{
                        $filter_by .= $f->cdpAlias.",";
                    }

                }else{

                    if($f->cdpAlias == 'detCategoria'){
                        $filter_by .= "detCategoria".",idDetalleProducto";
                    }else if($f->cdpAlias == 'detProveedor'){
                        $filter_by .= 'proNombre'.",idDetalleProducto";
                    }else if($f->cdpAlias == 'detIdAutor'){
                        $filter_by .= 'usuNombre'.",idDetalleProducto";
                    }else{
                        $filter_by .= $f->cdpAlias.",idDetalleProducto";
                    }
                }
            }

            $flag++;
        }

        $id = $request->input('id');
        $GLOBALS['idDetalle'] = $id;

        $query = DB::table('view_detalleProducto')->select(DB::raw($filter_by))->where('idEncabezadoProducto',$id)->get();
        return json_encode($query);
    }

    public function agregarDetalle(Request $request){

        $image = $request->file('target');
        
        for($x = 0;$x < count($image); $x++){
            $math = rand(1,1000);
            $name = time().$math.'_'.$image[$x]->getClientOriginalName();
            $destinationPath = public_path('/uploads/products');
            $image[$x]->move($destinationPath, $name);

            $request->add(['detFoto' => $name]);
        }

        $data = $request->all();
        $data = $request->except(['_token','target']);

        $query = DB::table('DetalleProducto')->insert($data);

        if($query){
            return $this->listarDetalles($GLOBALS['idDetalle']);
        }else{
            return "false";
        }

    }

    public function actualizarDetalle(Request $request){
        $id = $request->input('idDetalleProducto');
        $data = $request->all();

        $query = DB::table('DetalleProducto')->where('idDetalleProducto',$id)->update($data);

        if($query){
            return $this->listarDetalles();
        }else{
            return "false";
        }
    }

    public function eliminarDetalle(Request $request){
        $id = $request->input('id');

        // $query = DB::table('view_detalleProducto')->where('idDetalleProducto',$id)->delete();
        $query = DB::table('DetalleProducto')->where('idDetalleProducto',$id)->delete();

        if($query){
            return $this->listarDetalles($GLOBALS['idDetalle']);
        }else{
            return "false";
        }
    }
}
