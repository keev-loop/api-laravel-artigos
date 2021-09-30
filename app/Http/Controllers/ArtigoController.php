<?php


namespace App\Http\Controllers;

use App\Models\Artigo as Artigo;
use App\Http\Resources\Artigo as ArtigoResource;
use Illuminate\Http\Request;


class ArtigoController extends Controller {

  public function index(){
    $artigos = Artigo::paginate(15);
    return ArtigoResource::collection($artigos);
  }

  public function show($id){
    $artigo = Artigo::findOrFail( $id );
    return new ArtigoResource( $artigo );
  }

  public function store(Request $request){
    $artigo = new Artigo;
    $artigo->titulo = $request->input('titulo');
    $artigo->conteudo = $request->input('conteudo');

    if( $artigo->save() ){
      return new ArtigoResource( $artigo );
    }
  }

   public function update(Request $request){
    $artigo = Artigo::findOrFail( $request->id );
    $artigo->titulo = $request->input('titulo');
    $artigo->conteudo = $request->input('conteudo');

    if( $artigo->save() ){
      return new ArtigoResource( $artigo );
    }
  } 

  public function destroy($id){
    $artigo = Artigo::findOrFail( $id );
    if( $artigo->delete() ){
      return new ArtigoResource( $artigo );
    }

  }
}