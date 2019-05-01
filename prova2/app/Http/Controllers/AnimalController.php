<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Animal;
use App\Tipo;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;

require 'C:\Program Files\VertrigoServ\www\prova2\vendor\autoload.php';

class AnimalController extends Controller
{
    //
    function index(Request $request){
    	if($request->get("id") == null){
    		$animal = new Animal();
    	}else {
    		$animal = Animal::Where('id', $request->get("id"))->first();//Chamando metodo statico chamado where semelhante ao select, fazendo busca no banco, onde request traz o resultado do banco, o first garante que pega da colection somente primeiro objeto semelhante limite 1

    	}
    	return view('animais.cadastro', array('animal' => $animal, 
        'tipos' => Tipo::All()));//como chamar um arquivo dentro de uma pasta
        //categorias é o objeto, categoria nome da classe
    }

    function listar(){

        $dados = DB::table('animal')
            ->join("tipos", "tipos.id","=","animal.tipo")
            ->select("animal.*", "tipos.descricao")->get();

        return view('animais.lista', array('animais'=>$dados));
    }

    function salvar(Request $request){//Framework de requisição http
    //var_dump($request->all());//Serve para mostrar os arquivo enviados pelo submit

    
    date_default_timezone_set("Brazil/East");
    $data = date("d M Y", strtotime('0 year'));
    $dn = new Carbon($request->get('dataN'));

    $agora = Carbon::now();

    $idade = $agora->diff($dn);

    $idade = $idade->y;


    $validatedData = $request->validate([
            "nomeA" => "required|max:100",
            "nomeD" => "required|max:100",
         	"tipo" => "required",
            "descricaoR" => "required|max:100",
            "dataN" => "required|before:$agora",
            "foto" => "required|file",
        ]);
            
    if($request->get('id') == null){
        $animal = new Animal();
    }else{
        $animal = Animal::Where('id', $request->get('id'))->first();
        // SELECT * FROM chamado WHERE id = $_GET['id'] LIMIT 1
    }

    $animal->nomeA = $request->get('nomeA');//pegando os valores e colocando dentro do objetos
    $animal->nomeD = $request->get('nomeD');
    $animal->tipo = $request->get('tipo');
    $animal->dataN = $request->get('dataN');
    $animal->descricaoR = $request->get('descricaoR');
    $animal->idade = $idade;

    if($request->hasFile('foto')){//getClientOriginalName pega o nome do upload para colocar no objet que sera persistido no banco
        $animal->foto = $request->file('foto')->getClientOriginalName();
        //storeAs recebe 3 parametros: 
        //1. nome a ser salvo(mesmo nome do objeto),
        //2.pasta a salvar(null salvar direto na raiz),
        //3. disco(usaremos o public)
        $request->file('foto')->storeAs($animal->foto, null, 'public');//Salva o arquivo dentro da pasta storage

    }else{
        $animal->foto = null;//Se não tiver arquivo ele seta null no banco
    }
    

    $animal->save();//Salvando objeto

    return $this->listar();

    }

    function excluir(Request $request){

        if($request->get('id') != null){
            $animal = Animal::Where('id', $request->get('id'))->first();
            $animal->delete();
            return $this->listar();
        }
    }

}
