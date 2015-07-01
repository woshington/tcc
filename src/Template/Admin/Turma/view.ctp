<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Nome: <?=$turma->nome?> </h3>
        <h3>Ano: <?=$turma->ano?> </h3>
        <h3>Turno: <?=$turnos[$turma->turno]?> </h3>
        <h3>Curso: <?=$turma->curso->descricao?> </h3>
        <h3>Sala: <?=$turma->sala->nome?> </h3>        
    </div>
    <div class="panel-footer"><?=$this->Html->link('Editar', ['action'=>'edit', $turma->id])?>
    </div>
</div>
