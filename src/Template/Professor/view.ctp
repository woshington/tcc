<?=$this->element('menuLateralProf')?>
<div class="professor view large-10 medium-9 columns">
    <h2><?= h($professor->usuario->nome) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= $professor->has('usuario') ? $professor->usuario->email : '' ?></p>
            <h6 class="subheader"><?= __('Eixo') ?></h6>
            <p><?= $professor->has('eixo') ? $professor->eixo->descricao : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <p><?=$this->Html->link('Editar', ['action'=>'edit'])?></p>
            <p><?=$this->Html->link('Nova Senha', ['controller'=>'usuario', 'action'=>'novaSenha'])?></p>
        </div>
    </div>
</div>
