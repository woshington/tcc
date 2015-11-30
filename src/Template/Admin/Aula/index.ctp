<script type="text/javascript">
	function escondeBody(turma){	
		if($('#visivel'+turma).val()=='1'){
			$('#id'+turma).fadeOut('slow');
			$('#headReposicao'+turma).fadeOut('slow');
			$('#bodyReposicao'+turma).fadeOut('slow');		
			$('#visivel'+turma).val('0');
		}else{
			$('#id'+turma).fadeIn('slow');
			$('#headReposicao'+turma).fadeIn('slow');
			$('#bodyReposicao'+turma).fadeIn('slow');		
			$('#visivel'+turma).val('1');
		}
	}
	function filtroController($scope) {
		console.log($scope.data);
	}		
</script>
<div class="panel panel-default" ng-app='Filtro-App' >
	<div class="panel-heading" ng-controller="filtroController">Data - <?=$dataBase?></div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-3"> 
	  			<input type="date" name="data" ng-model="data" placeholder="yyyy-MM-dd" 
	  	max="<?=date('Y-m-d')?>" class="form-control">
	  		</div>
	  		<div class="col-md-1">	  		
  	<?=$this->Html->link('<span class="glyphicon glyphicon-search"> Filtrar</span>', ['action'=>'index/{{data}}'], ['class'=>'btn btn-default', 'escape'=>false]);?>
	  			</a>
	  		</div>
	  	</div>	  	
	  </div>
</div>
<?php foreach ($turmas as $key=>$turma): ?>
	<div class="panel panel-default">
	  <input type="hidden" id="visivel<?=$key?>" value="1">
	  <div class="panel-heading" onclick="escondeBody(<?=$key?>)">Turma: <?=$turma->nome?></div>
	  <div class="panel-body" id="id<?=$key?>">
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
				<?php 										
					$aulasDia = $turma->getAulasDia($dataBase); 
				?>
				
				<?php foreach (@$aulasDia as $aula): ?>
					<?php 
						$classe = '';
						$exibirBtn = true;
						if($aula['status']!='P'){
							if($aula['status']=='A'){
								if($aula['ministrou_antecipacao']=='M'){
									$classe = "success";
									$exibirBtn = false;
								}else{
									$classe = "danger";

								}
							}else{
								$classe = $aula['status']=='F' ? 'danger' : 'success';
							}
						}
						
					?>
					<tr class="<?=$classe?>">
						<td><?=$aula['aula']?></td>
						<td><?=$aula['disciplina']?></td>
						<td><?=$aula['professor']?></td>		
						<td>
						<?php 
						if($exibirBtn){
						
							echo $this->Form->postLink(__('Faltou'),['action' => 'confirmar', $aula['id'], $dataBase, true], ['confirm'=>'Deseja aplicar essa falta?', 'class'=>'btn btn-danger']);
							echo $this->Form->postLink(__('Ministrou'),['action' => 'confirmar', $aula['id'], $dataBase], ['confirm'=>'Confirmar presença?', 'class'=>'btn btn-success']);
						}
						?>
						</td>
					</tr>					
				<?php endforeach ?>				
				<tr>			
				</tr>
			</tbody>
		</table>
	  </div>
	  <div class="panel-heading" id="headReposicao<?=$key?>">Reposições/Antecipações marcadas</div>
	  <div class="panel-body" id="bodyReposicao<?=$key?>">
	  	<table class="table">
	  		<?php $reposicoes = $turma->getReposicoes($dataBase);?>
	  		<?php foreach ($reposicoes as $reposicao): ?>
	  			<?php 
						$classe = '';
						if($reposicao['status']!='C')
							$classe = $reposicao['status']=='M' ? 'success' : 'danger';
					?>
	  			<tr class="<?=$classe?>">
	  				<td><?=$reposicao['aula_repor']?></td>
	  				<td><?=$reposicao['disciplina']?></td>
	  				<td><?=$reposicao['professor']?></td>
	  				<td>
						<?php 
						echo $this->Form->postLink(__('Faltou'),['action' => 'confirmarReposicao', $reposicao['id'], true], ['confirm'=>'Deseja aplicar essa falta?', 'class'=>'btn btn-danger']);
						?>
						<?php 
							echo $this->Form->postLink(__('Ministrou'),['action' => 'confirmarReposicao', $reposicao['id']], ['confirm'=>'Deseja aplicar essa falta?', 'class'=>'btn btn-success']);
						?>
					</td>
	  			</tr>
	  		<?php endforeach ?>	  		
	  	</table>
	  </div>
  	</div>
<?php endforeach ?>