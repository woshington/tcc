<table class="table table-bordered">
<caption><?=$turma->nome."/".$turma->curso->descricao?></caption>
  <thead>
  	<tr>
  		<th>Aula</th>
  		<th>Seg</th>
  		<th>Ter</th>
  		<th>Qua</th>
  		<th>Qui</th>
  		<th>Sex</th>
  		<th>Sab</th>
  	</tr>
  </thead>
  <tbody>
    <?php $horario = $horario->toArray();?>
    <?php for($i=1;$turma->turno!='I' ? $i<=6 : $i<10;$i++):?>      
  	<tr>
        <td><?=$i?></td>
        <?php 
            for($j=1;$turma->turno!='I' ? $j<=6 : $j<=10;$j++){
            if(@$horario[$i][$j]){          
                echo "<td>".$disciplinas[$grade[$horario[$i][$j]]]."</td>";
          
            }else{
              echo "<td>Vago</td>";
            }
            
          }
        ?>
    </tr>
  <?php endfor;?>
  </tbody>
  <tfoot>
  	<tr>
  		<td colspan="7" align="right">
  			<a class="btn btn-primary" href="../edit/<?=$turma->id?>">
            	<span class="glyphicon glyphicon-edit"> Editar</span> 
        	</a>
  		</td>
  	</tr>
  </tfoot>
</table>