@extends("layouts.app")

@section("content")      

          <div class="Container">
              <div class="page-header">
                <CENTER><h1>Cadastro de Animais</h1></CENTER>        
               </div>
               <br/>
               <br/>
                <div class="col-sm-12"><!-- Container principal-->
                <form id="form" action="/atendimento/salvar" method="post" class="valid rsform" enctype="multipart/form-data"><!-- Formulário-->

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" /><!-- Mantem a sessão ativa, gerando um token novo sempre, a cada conexao-->

                  <div class="form-group row col-sm-9"><!-- Div do Select to tipo-->
                    <label for="animal" class="col-sm-3 col-form-label">Nome do Animal: </label>
                    <div class="col-sm-11">
                      <select class="form-control required" id="animal" name="animal" data-nome="Nome do animal">
                        <option></option>
                        @foreach($animais as $row)
                          @if($row->id == $atendimento->animal)
                          <option value="{{ $row->id }}" selected="selected">{{ $row->nomeA }}</option>
                        @else
                          <option value="{{ $row->id }}">{{ $row->nomeA }}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="nomeV" class="col-sm-3 col-form-label">Nome do veterinário: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="nomeV" name="nomeV" placeholder="Digite aqui nome do veterinário" value="{{ $atendimento->nomeV }}" data-nome="Nome do veterinário"/>
                    </div>
                  </div>
                  <br/>   

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="detAtendimento" class="col-sm-3 col-form-label">Detalhamento do atendimento: </label>
                    <div class="col-sm-11">

                      <textarea class="form-control required" id="detAtendimento" rows="3" name="detAtendimento" placeholder="Digite aqui o detalhamento do atendimento" data-nome="Detalhamento do atendimento">{{ $atendimento->detAtendimento }}</textarea>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group"><!-- Div da data-->
                    <label for="dataA" class="col-sm-3 col-form-label">Data de atendimento:</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control required" id="dataA" name="dataA" value="{{ $atendimento->dataA }}" data-nome="Data de atendimento"/>
                    </div>
                  </div>
                  <br/>         

                    <input type="hidden" name="id" value="{{ $atendimento->id }}" />

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

              var dataN = document.getElementById('dataN').value;

              if (new Date() > new Date(dataN))
              {
                  alert("Cadastre uma data de nascimento válida! Menor que data atual!");
              }

    }

  </script>

@stop