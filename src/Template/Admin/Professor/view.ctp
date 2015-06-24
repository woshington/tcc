<?=$this->element('menuLateral')?>
<div class="professor view large-10 medium-9 columns">
    <h2><?= h($professor->usuario->nome) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Eixo') ?></h6>
            <p><?= $professor->has('eixo') ? $professor->eixo->descricao : '' ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Coordenador') ?></h6>
            <p><?= $professor->coordenador ? __('Sim') : __('Não'); ?></p>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="large-2 columns numbers end">
            <p><?=$this->Html->link(__('Editar'), ['action'=>'edit', $professor->id])?></p>
            <p><?=$this->Html->link('Nova senha', ['controller'=>'usuario', 'action'=>'novaSenha', $professor->usuario->id])?></p>
        </div>
    </div>
</div>
