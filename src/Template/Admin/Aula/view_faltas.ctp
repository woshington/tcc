<div class="panel panel-default">
  <div class="panel-heading">Relatorio de faltas da turma: <?=$turma->nome?></div>
  <div class="panel-body">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Data</th>
			<th>Aula</th>
			<th>Disciplina</th>
			<th>Professor</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($faltas as $falta): ?>
			<tr>
				<td><?=$falta->calendario->data?></td>
				<td><?=$falta->aula?></td>
				<td><?=$falta->disciplina->nome?></td>
				<td><?=$falta->gradeCurricular->professor->usuario->nome?></td>
			</tr>
		<?php endforeach ?>
		<tr></tr>
	</tbody>
</table>