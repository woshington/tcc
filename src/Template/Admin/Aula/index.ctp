<?php foreach ($turmas as $key=>$turma): ?>
	<div class="panel panel-default">
	  <div class="panel-heading">Turma: <?=$turma?></div>
	  <div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Horario</th>
					<th>Disciplina</th>
					<th>Professor</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach (@$horarios[$key] as $horario): ?>
					<?php 
						$classe = '';
						if(isset($aulasRegistradas[$key][$horario->aula])){
							$classe = $aulasRegistradas[$key][$horario->aula]=='M' ? 'success' : 'danger';
						}
					?>
					<tr class="<?=$classe?>">
						<td><?=$horario->aula?></td>
						<td><?=$horario->grade_curricular->disciplina->nome?></td>
						<td><?=$horario->grade_curricular->professor->usuarios->nome?></td>		
						<td>
						<?php 
						echo $this->Form->postLink(__('Faltou'),['action' => 'confirmar', $horario->id, true], ['confirm'=>'Deseja aplicar essa falta?', 'class'=>'btn btn-danger']);
						?>
						<?php 
						echo $this->Form->postLink(__('Ministrou'),['action' => 'confirmar', $horario->id], ['confirm'=>'Confirmar presença?', 'class'=>'btn btn-success']);
						?>
						</td>
					</tr>					
				<?php endforeach ?>
				<tr>			
				</tr>
			</tbody>
		</table>
	  </div>
  	</div>
<?php endforeach ?>