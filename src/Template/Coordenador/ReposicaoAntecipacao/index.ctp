<table class="table table-striped">
	<thead>
		<tr>
			<th>Numero</th>
			<th>Professor</th>
			<th>data falta</th>
			<th>Turma</th>
			<th>Data reposição</th>
			<th>Justificativa</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>		
		<?php foreach ($coordenador->reposicoesPendentes as $reposição): ?>
			<tr>
				<td><?=$reposição['id']?></td>
				<td><?=$reposição['nome']?></td>
				<td><?=$reposição['data']?></td>
				<td><?=$reposição['turma']?></td>
				<td><?=$reposição['data_reposicao']?></td>
				<td><?=$reposição['justificativa']?></td>
				<td>
				<a href="/tcc/coordenador/reposicao_antecipacao/view/3">
					<?=$this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action'=>'view', $reposição['id']], ['escape'=>false]);?>
				</td>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>