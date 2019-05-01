<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    function index(Request $request){
    	if($request->get("id") == null){
    		$tipo = new Tipo();
    	}else {
    		$tipo = Tipo::Where('id', $request->get("id"))->first();//Chamando metodo statico cliente where semelhante ao select, fazendo busca no banco, onde request traz o resultado do banco, o first garante que pega da colection somente primeiro objeto semelhante limite 1

    	}
    	return view('tipos.cadastro', array('tipos' => $tipo));
        //como chamar um arquivo dentro de uma pasta
        //categorias é o objeto, categoria nome da classe
    }

    function listar(){
    	return view('tipos.lista', array('tipos'=> Tipo::All()));
        //como chamar um arquivo dentro de uma pasta
    	//nao precisa da chamada da pasta app pq ja foi chamada
    }

    function salvar(Request $request){//Framework de requisição http
    //var_dump($request->all());//Serve para mostrar os arquivo enviados pelo submit

    $validatedData = $request->validate([
            "descricao" => "required|max:100",
        ]);
            
    if($request->get('id') == null){
        $tipo = new Tipo();
    }else{
        $tipo = Tipo::Where('id', $request->get('id'))->first();
        // SELECT * FROM chamado WHERE id = $_GET['id'] LIMIT 1
    }

    $tipo->descricao = $request->get('descricao');//pegando os valores e colocando dentro do objetos

    $tipo->save();//Salvando objeto

    return $this->listar();

    }

    function excluir(Request $request){

        if($request->get('id') != null){
            $tipo = Tipo::Where('id', $request->get('id'))->first();
            $tipo->delete();
            return $this->listar();
        }
    }
}
