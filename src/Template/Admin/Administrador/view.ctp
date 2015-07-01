<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Nome: <?= h($administrador->usuario->nome)?> </h3>
        <h3>Cargo: <?=$administrador->cargo?> </h3>
        <h3>Setor: <?=$administrador->setor?> </h3>
        </div>
        <div class="panel-footer">
            <?=$this->Html->link('Editar', ['action'=>'edit', $administrador->id])?> |
            <?=$this->Html->link('Nova senha', ['controller'=>'usuario', 'action'=>'novaSenha', $administrador->usuario->id])?>
        </div>
    </div>
</div>
