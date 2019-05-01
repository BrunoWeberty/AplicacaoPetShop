@extends("layouts.app")

@section("content")
	<div class="container">

       <div class="page-header">
        <CENTER><h1>Listagem</h1></CENTER>        
       </div>


         <div>
           <table id="table_id" class="table table-striped table-bordered table-hover table-bordered">
            <!--1-Coloca cores alternadas de linhas-->
            <!--2-Coloca bordas envolta da tabela-->
            <!--3-Coloca efeito hover nas linhas-->
            <!--4-Condensa os espacos dentro da tabela-->
             <thead>
               <tr>
                 <th>Nome do animal</th>
                 <th>Nome do dono</th>
                 <th>Tipo</th>
                 <th>Detalhes de raça</th>
                 <th>Data de nascimento</th>
                 <th>Foto</th>
                 <th>Idade</th>
                 <th>Editar</th>
                 <th>Excluir</th>
               </tr>
             </thead>
             <tbody>
               @foreach($animais as $row)
               		<tr>
               			<td>{{ $row->nomeA }}</td>
                    <td>{{ $row->nomeD }}</td>
                    <td>{{ $row->descricao }}</td>
                    <td>{{ $row->descricaoR }}</td>
                    <td>{{date('d/m/Y',  strtotime( $row->dataN ))}}</td>
                    <td><img width="100px" src="{{ Storage::url($row->foto) }}"></td>
                    <td>{{ $row->idade }}</td>
                    <td>
                      <a href="/animal?id={{$row->id }}">Editar</a>
                    </td>
                    <td>
                      <a onclick="return confirm('Deseja realmente excluir?');" href="/animal/excluir?id={{ $row->id }}">Excluir</a>
                    </td>
               		</tr>
               @endforeach
             </tbody>

           </table>

           
         </div>

     </div> 

     <script type="text/javascript">
      $(document).ready( function () { $('#table_id').DataTable(); } );
    </script>
@stop