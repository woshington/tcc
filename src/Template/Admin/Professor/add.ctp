<?=$this->element('menuLateral')?>
<div class="professor form large-10 medium-9 columns">
    <?= $this->Form->create($professor) ?>
    <fieldset>
        <legend><?= __('Add Professor') ?></legend>
        <?php
            echo $this->Form->input('usuario.nome');
            echo $this->Form->input('usuario.email');
            echo $this->Form->input('usuario.senha');
            echo $this->Form->input('usuario.ativo');
            echo $this->Form->input('usuario.matricula');
            echo $this->Form->input('coordenador');
            echo $this->Form->input('eixo_id', ['options'=>$eixo]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
