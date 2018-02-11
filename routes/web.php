<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'SessionController@index')->name('sesion');
// Route::get('/',function(){return view("Session/Install");});

// Configuración
Route::post('agregarConfiguracion','SessionController@agregar')->name('agregarConfiguracion');

// Sesión
Route::post('validarUsuario','SessionController@validarUsuario');
Route::get('Login','SessionController@index');
Route::get('cerrarSesion','SessionController@cerrarSesion');

// Ajustes
Route::get('Ajustes','AjusteController@index');
Route::post('actualizarAjustes','AjusteController@actualizar');
	// -> Productos
	Route::get('ConfigurarProductos','AjusteController@configurarProductos');
	Route::get('listarConfiguracion','AjusteController@listarConfiguracion');
	Route::post('agregarNuevoCampo','AjusteController@agregarNuevoCampo');
	Route::post('agregarCampoDetalle','AjusteController@agregarCampoDetalle');
	Route::post('actualizarCampoEncabezado','AjusteController@actualizarCampoEncabezado');
	Route::post('actualizarCampoDetalle','AjusteController@actualizarCampoDetalle');
	Route::post('eliminarCampoEncabezado','AjusteController@eliminarCampoEncabezado');
	Route::post('eliminarCampoDetalle','AjusteController@eliminarCampoDetalle');

	// Políticas de productos
	Route::get('ppListarPoliticas','AjusteController@listarPoliticas');
	Route::post('ppAgregarPoliticas','AjusteController@agregarPolitica');
	Route::post('ppActualizarPoliticas','AjusteController@actualizarPolitica');
	Route::post('ppEditarPoliticas','AjusteController@editarPolitica');
	Route::post('ppEliminarPoliticas','AjusteController@eliminarPolitica');

	// Politicas generales
	Route::get('Politicas','PoliticaController@Politicas');

// Home
Route::get('Home','HomeController@index');
Route::get('Cuenta','HomeController@cuenta');

// PosController
Route::get('POS','POSController@index');

// POS-Usuarios
Route::get('Usuarios','UsuarioController@index');
Route::get('listarUsuarios','UsuarioController@listarUsuarios');
Route::post('listarUsuario','UsuarioController@listarUsuario');
Route::post('obtenerUsuario','UsuarioController@obtenerUsuario');
Route::post('agregarUsuario','UsuarioController@agregarUsuario');
Route::post('actualizarUsuario','UsuarioController@actualizarUsuario');
Route::post('eliminarUsuario','UsuarioController@eliminarUsuario');

// Inventario
Route::get('Inventario','InventarioController@index');
	// -> Clientes
	Route::get('Clientes','ClienteController@index');
	Route::post('agregarCliente','ClienteController@agregarCliente');
	Route::get('listarClientes','ClienteController@listarClientes');
	Route::post('obtenerCliente','ClienteController@obtenerCliente');
	Route::post('actualizarCliente','ClienteController@actualizarCliente');
	Route::post('eliminarCliente','ClienteController@eliminarCliente');

	// -> Sucursales
	Route::get('Sucursales','SucursalController@index');
	Route::get('listarSucursales','SucursalController@listarSucursales');
	Route::post('obtenerSurcusal','SucursalController@obtenerSurcusal');
	Route::post('agregarSucursal','SucursalController@agregarSucursal');
	Route::post('actualizarSucursal','SucursalController@actualizarSucursal');
	Route::post('eliminarSucursal','SucursalController@eliminarSucursal');

	// -> Proveedores
	Route::get('Proveedores','ProveedorController@index');
	Route::post('agregarProveedor','ProveedorController@agregarProveedor');
	Route::get('listarProveedores','ProveedorController@listarProveedores');
	Route::post('obtenerProveedor','ProveedorController@obtenerProveedor');
	Route::post('actualizarProveedor','ProveedorController@actualizarProveedor');
	Route::post('eliminarProveedor','ProveedorController@eliminarProveedor');

	// -> Productos
	Route::get('Productos','ProductoController@index');
	Route::get('listarEncabezado','ProductoController@listarEncabezado');
	Route::post('agregarEncabezado','ProductoController@agregarEncabezado');
	Route::post('obtenerEncabezado','ProductoController@obtenerEncabezado');
	Route::post('obtenerEDetalle','ProductoController@obtenerEDetalle');
	Route::post('actualizarProducto','ProductoController@actualizarProducto');
	Route::post('eliminarEncabezado','ProductoController@eliminarEncabezado');
	
	Route::post('listarDetalles','ProductoController@listarDetalles');
	Route::post('agregarDetalle','ProductoController@agregarDetalle');
	Route::post('editarDetalle','ProductoController@editarDetalle');
	Route::post('actualizarDetalle','ProductoController@actualizarDetalle');
	Route::post('eliminarDetalle','ProductoController@eliminarDetalle');

	// -> Categorías
	Route::get('Categorias','CategoriaController@index');
	Route::get('listarCategorias','CategoriaController@listarCategorias');
	Route::post('agregarCategoria','CategoriaController@agregarCategoria');
	Route::post('obtenerCategoria','CategoriaController@obtenerCategoria');
	Route::post('actualizarCategoria','CategoriaController@actualizarCategoria');
	Route::post('eliminarCategoria','CategoriaController@eliminarCategoria');

	// Galeria
	Route::post('listarGaleria','GaleriaController@listarGaleria');
	Route::post('subirImagen','GaleriaController@subirImagen');