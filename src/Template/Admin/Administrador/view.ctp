<?=$this->element('menuLateral')?>
<div class="administrador view large-10 medium-9 columns">

    <h2><?= h($administrador->usuario->nome) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Cargo') ?></h6>
            <p><?= h($administrador->cargo) ?></p>
            <h6 class="subheader"><?= __('Setor') ?></h6>
            <p><?= h($administrador->setor) ?></p>
            <h6 class="subheader"><?= __('Usuario') ?></h6>
        </div>
        
        <div class="large-2 columns numbers end">
        <p><?=$this->Html->link(__('Editar'), ['action'=>'edit', $administrador->id])?></p>
        <p><?=$this->Html->link('Nova senha', ['controller'=>'usuario', 'action'=>'novaSenha', $administrador->usuario->id])?></p>
        </div>
        
    </div>    
</div>
