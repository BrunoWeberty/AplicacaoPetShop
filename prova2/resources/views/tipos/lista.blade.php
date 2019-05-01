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
                 <th>Tipo</th>
                 <th>Editar</th>
                 <th>Excluir</th>
               </tr>
             </thead>
             <tbody>
               @foreach($tipos as $row)
               		<tr>
               			<td>{{ $row->descricao }}</td>

                    <td>
                      <a href="/tipo?id={{$row->id }}"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    </td>
                    <td>
                      <a onclick="return confirm('Deseja realmente excluir?');" href="/tipo/excluir?id={{ $row->id }}"><span class="glyphicon glyphicon-remove-sign">Excluir</span></a>
                    </td>
               		</tr>
               @endforeach
             </tbody>

           </table>

           
         </div>

     </div> 

@stop