<script type="text/javascript">
	$(function(){
		$('#data').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
		});
	});
</script>

<div class="panel panel-default">
  <div class="panel-heading">Solicitação de reposição</div>
  <div class="panel-body">
    <?= $this->Form->create($reposicaoAntecipacao) ?>
    <div class="row"> 
    	<div class="col-md-6">
    		<div class="form-group">
		    	<?=$this->Form->input('justificativa', ['div'=>false, 'class'=>'form-control']);?>
		    </div>
    	</div>
    	<div class="col-md-6">
    		<div class="form-group">
		    	<?=$this->Form->input('dataReposicao', ['div'=>false, 'class'=>'form-control', 'id'=>'data', 'type'=>'text']);?>
		    </div>
    	</div>
    </div>
    <div class="row">
        <?=$this->Form->label('aulaReposicaoAntecipacao.reposicao_antecipacao_id');?>
    	<table class="table">
    		<thead>
    			<tr>
    				<th>Data</th>
    				<th>Turma</th>
    				<th>Aula</th>
    				<th>Aula Reposição</th>
    				<th>Repor</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?=$this->Form->create($reposicaoAntecipacao)?>
    			<?php foreach ($usuario->professor->faltasWithoutSolicitacaoReposicao as $key=>$falta): ?>
    				<?=$this->Form->hidden('aulaReposicaoAntecipacao.'.$key.'.aula_id', ['value'=>$falta['id']]);?>
    				<tr>    					
    					<td><?=$falta['data']?></td>
    					<td><?=$falta['turma']."/".$falta['sigla']?></td>
    					<td><?=$falta['aula']?></td>
    					<td width="50px">
							<?=$this->Form->input('aulaReposicaoAntecipacao.'.$key.'.aula_repor', ['div'=>false, 'label'=>false, 'class'=>'form-control', 'type'=>'number', 'style'=>'size:10px;']);?>
    					</td>
    					<td><?=$this->Form->checkbox('aulaReposicaoAntecipacao.'.$key.'.repor', ['hiddenField' => false]);?></td>
    				</tr>
    			<?php endforeach ?>    			
    			<?=$this->Form->end()?>
    			<tfoot>
    				<tr>
    					<td colspan="6">
    						<div class="form-group">
			    				<button class="btn btn-success" type="submit">
			    					<span class="glyphicon glyphicon-ok"> Salvar</i></span>
			    				</button>
			    				<a href="../turma" class="btn btn-default" >
			    					<span class="glyphicon glyphicon-off"> Cancelar</span>
			    				</a>
			    			</div>
    					</td>
    				</tr>
    			</tfoot>
    		</tbody>
    	</table>
    </div>
    <?=$this->Form->end()?>
   </div>
</div>