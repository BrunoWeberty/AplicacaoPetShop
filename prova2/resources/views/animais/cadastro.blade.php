@extends("layouts.app")

@section("content")      

          <div class="Container">
              <div class="page-header">
                <CENTER><h1>Cadastro de Animais</h1></CENTER>        
               </div>
               <br/>
               <br/>
                <div class="col-sm-12"><!-- Container principal-->
                <form id="form" action="/animal/salvar" method="post" class="valid rsform" enctype="multipart/form-data"><!-- Formulário-->

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" /><!-- Mantem a sessão ativa, gerando um token novo sempre, a cada conexao-->

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="nomeA" class="col-sm-3 col-form-label">Nome do animal: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="nomeA" name="nomeA" placeholder="Digite aqui nome do animal" value="{{ $animal->nomeA }}" data-nome="Nome do Animal"/>
                    </div>
                  </div>
                  <br/>   

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="nomeD" class="col-sm-3 col-form-label">Nome do dono: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="nomeD" name="nomeD" placeholder="Digite aqui nome do seu animal" value="{{ $animal->nomeD }}" data-nome="Nome do Dono"/>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do Select to tipo-->
                    <label for="tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-11">
                      <select class="form-control required" id="tipo" name="tipo" data-nome="Tipo">
                        <option></option>
                        @foreach($tipos as $row)
                          @if($row->id == $animal->tipo)
                          <option value="{{ $row->id }}" selected="selected">{{ $row->descricao }}</option>
                        @else
                          <option value="{{ $row->id }}">{{ $row->descricao }}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="descricaoR" class="col-sm-3 col-form-label">Detalhes da Raça: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="descricaoR" name="descricaoR" placeholder="Digite aqui detalhes da raça seu animal" value="{{ $animal->descricaoR }}" data-nome="Detalhes da raça"/>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group"><!-- Div da data-->
                    <label for="dataN" class="col-sm-3 col-form-label">Data de nascimento:</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control required" id="dataN" name="dataN" value="{{ $animal->dataN }}" data-nome="Data de nascimento"/>
                    </div>
                  </div>
                  <br/>         

                  <div class="form-group"><!-- Div do file, enviar arquivo-->
                    <label for="foto" class="col-sm-1 col-form-label">Foto:</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control-file required" name="foto" id="foto" data-nome="Foto" accept="image/*"/>
                  </div>            
                  <br/> 

                    <input type="hidden" name="id" value="{{ $animal->id }}" />

                    <div class="col-sm-4"><!-- Div do botao-->
                        <button onclick="return validar();" type="submit" class="btn btn-primary btn-right">Salvar</button>
                    </div>
                  </div>                
                </form>

          </div>

  <script type="text/javascript">

    function validar(){

              var sucesso = true;//cria campo para o each validar

              $(".required").each(function() {
                if($(this).val() == ""){
                  var nome_campo = $(this).data("nome");
                  alert("Campo " +nome_campo +" obrigatório!");
                  sucesso = false;
                }
              });

              return sucesso;

    }

  </script>

@stop