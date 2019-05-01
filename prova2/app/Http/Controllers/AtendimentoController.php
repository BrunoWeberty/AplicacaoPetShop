<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atendimento;
use App\Animal;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;

require 'C:\Program Files\VertrigoServ\www\prova2\vendor\autoload.php';

class AtendimentoController extends Controller
{
    function index(Request $request){
    	if($request->get("id") == null){
    		$atendimento = new Atendimento();
    	}else {
    		$atendimento = Atendimento::Where('id', $request->get("id"))->first();//Chamando metodo statico chamado where semelhante ao select, fazendo busca no banco, onde request traz o resultado do banco, o first garante que pega da colection somente primeiro objeto semelhante limite 1

    	}
    	return view('atendimentos.cadastro', array('atendimento' => $atendimento, 
        'animais' => Animal::All()));//como chamar um arquivo dentro de uma pasta
        //categorias é o objeto, categoria nome da classe
    }

    function listar(){

        $dados = DB::table('atendimento')
            ->join("animal", "animal.id","=","atendimento.animal")
            ->select("atendimento.*", "animal.nomeA")->get();

        return view('atendimentos.lista', array('atendimentos'=>$dados));
    }

    function salvar(Request $request){//Framework de requisição http
    //var_dump($request->all());//Serve para mostrar os arquivo enviados pelo submit


    $validatedData = $request->validate([
    		"animal" => "required",
            "nomeV" => "required|max:100",
            "detAtendimento" => "required|max:255",
            "dataA" => "required",
        ]);
            
    if($request->get('id') == null){
        $atendimento = new Atendimento();
    }else{
        $atendimento = Atendimento::Where('id', $request->get('id'))->first();
        // SELECT * FROM chamado WHERE id = $_GET['id'] LIMIT 1
    }

    $atendimento->animal = $request->get('animal');//pegando os valores e colocando dentro do objetos
    $atendimento->nomeV = $request->get('nomeV');
    $atendimento->detAtendimento = $request->get('detAtendimento');
    $atendimento->dataA = $request->get('dataA');;  

    $atendimento->save();//Salvando objeto

    return $this->listar();

    }

    function excluir(Request $request){

        if($request->get('id') != null){
            $atendimento = Atendimento::Where('id', $request->get('id'))->first();
            $atendimento->delete();
            return $this->listar();
        }
    }
}
