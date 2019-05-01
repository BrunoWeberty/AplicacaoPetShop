@extends("layouts.app")

@section("content")
	<div class="container">

       <div class="page-header">
        <CENTER><h1>Listagem</h1></CENTER>        
       </div>


         <div>
           <table class="table table-striped table-bordered table-hover table-bordered">
            <!--1-Coloca cores alternadas de linhas-->
            <!--2-Coloca bordas envolta da tabela-->
            <!--3-Coloca efeito hover nas linhas-->
            <!--4-Condensa os espacos dentro da tabela-->
             <thead>
               <tr>
                 <th>Nome do animal</th>
                 <th>Nome do veterinário</th>
                 <th>Detalhamento do Atendimento</th>
                 <th>Data do Atendimento</th>
                 <th>Editar</th>
                 <th>Excluir</th>
               </tr>
             </thead>
             <tbody>
               @foreach($atendimentos as $row)
               		<tr>
               			<td>{{ $row->nomeA }}</td>
                    <td>{{ $row->nomeV }}</td>
                    <td>{{ $row->detAtendimento }}</td>
                    <td>{{date('d/m/Y',  strtotime( $row->dataA ))}}</td>
                    <td>
                      <a href="/atendimento?id={{$row->id }}">Editar</a>
                    </td>
                    <td>
                      <a onclick="return confirm('Deseja realmente excluir?');" href="/atendimento/excluir?id={{ $row->id }}">Excluir</a>
                    </td>
               		</tr>
               @endforeach
             </tbody>

           </table>

           
         </div>

     </div> 

@stop