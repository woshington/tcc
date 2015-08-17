<table class="table table-bordered" align="center">
	<caption><?=$turma->descricao?></caption>
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
  <?=$this->Form->create($horario)?>
  	<?php for($i=0;$turma->turno!='I' ? $i<6 : $i<10;$i++):?>
  		<tr>
  			<td><?=$i+1?></td>
        <?php 
          for($j=0;$turma->turno!='I' ? $j<6 : $j<10;$j++){
            if(@$lista[$i+1][$j+1]){          
                echo "<td>".$this->Form->select('disciplina_id.'.$j.'.'.$i, $disciplinas, ['class'=>'form-control', 'value'=>$lista[$i+1][$j+1]])."</td>";
          
            }else{
              echo "<td>".$this->Form->select('disciplina_id.'.$j.'.'.$i, $disciplinas, ['class'=>'form-control', 'value'=>0])."</td>";
            }            
          }
          ?>  			
  		</tr>
  	<?php endfor;?>
  </tbody>  
  <tfoot>
  	<tr>
  		<td colspan="7" align="right">
  			<button type="submit" class="btn btn-primary">
            	<span class="glyphicon glyphicon-edit"> Save</span> 
        	</button>
  		</td>
  	</tr>
  </tfoot>
  <?=$this->Form->end()?>
</table>