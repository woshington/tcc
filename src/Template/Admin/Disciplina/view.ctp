<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Descrição: <?=$disciplina->nome?> </h3>        
    </div>
    <div class="panel-footer">
        <?=$this->Html->link('Editar', ['action'=>'edit', $disciplina->id])?>
    </div>
</div>
