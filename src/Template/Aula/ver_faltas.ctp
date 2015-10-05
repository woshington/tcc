<table class="table table-striped">
	<thead>
		<tr>
			<th>Turma</th>
			<th>Disciplina</th>
			<th>Aula</th>
			<th>Data</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($faltas as $falta): ?>
			<tr>
				<td><?= $falta['turma']?></td>
				<td><?= $falta['disciplina']?></td>
				<td><?= $falta['aula']?></td>
				<td><?= $falta['data']?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>