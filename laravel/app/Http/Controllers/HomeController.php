<?php

namespace App\Http\Controllers;

// Modelos
use App\Models\Comentario;
use App\Models\Banner;
use App\Models\Ciudad;
use App\Models\Estado;

// request
use App\Http\Requests\ComentarioRequest;
use App\Mail\MensajeMail;
use Illuminate\Http\Request;


class HomeController extends Controller
{

  public function index()
  {
    $estados = Estado::all();
    $banners =  Banner::where(['activo' => '1'])->orderBy('orden' , 'desc')->get();
    // enviamos parametros a la vista
    $parametros = [
      'estados' => $estados,
      'banners' => $banners
    ];
    // regresamos la vista compilada
    return view('home.index' , $parametros);
  }

  // wikipedia
  public function wiki(){
    return view('wiki.index');
  }

  function ciudades(Request $request){
    $id = $request->input('id');
    $ciudades = Ciudad::where('provincia' , $id)->get();
    return view('home.secciones.ciudad', compact('ciudades'))->render();
  }

  public function sendComentario(ComentarioRequest $request){
    $comentario = new Comentario;
    $comentario->nombre = $request->input('txtNombre');
    $comentario->email = $request->input('txtEmail');
    $comentario->telefono = $request->input('txtTelefono');
    $comentario->comentario = $request->input('txtComentario');
    $comentario->ciudad = $request->input('txtCiudad');
    $comentario->estado = $request->input('txtEstado');

    if($comentario->save()){
      // enviamos notificacion de email utilizando la clase
      // Mail::to(setting('site.correo'))->send(new MensajeMail($comentario));
      // enviamos respuesta al cliente
      return response(['msg'=>'Tu comentario ha sido enviado.']);
    }
    return response(['error'=>'Error al enviar tu mensaje']);
  }

}
