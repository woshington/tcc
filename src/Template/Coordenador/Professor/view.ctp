<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Nome: <?= h($professor->usuario->nome)?> </h3>
        <h3>Eixo: <?=$professor->eixo->descricao?> </h3>
        <h3>Coordenador: <?=$professor->coordenador ? 'Sim' : 'Não'?> </h3>
        </div>
        <div class="panel-footer">
            <?=$this->Html->link('Editar', ['action'=>'edit', $professor->id])?> |
            <?=$this->Html->link('Nova senha', ['controller'=>'usuario', 'action'=>'novaSenha', $professor->usuario->id])?> |
            <?=$this->Html->link('Professores', ['action'=>'index'])?> 
        </div>
    </div>
</div>
