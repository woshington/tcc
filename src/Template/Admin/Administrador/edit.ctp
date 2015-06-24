<?=$this->element('menuLateral')?>
<div class="administrador form large-10 medium-9 columns">
    <?= $this->Form->create($administrador) ?>
    <fieldset>
        <legend><?= __('Edit Administrador') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('usuario.nome');
            echo $this->Form->input('usuario.email');
            echo $this->Form->input('usuario.ativo');
            echo $this->Form->input('usuario.matricula');
            echo $this->Form->input('cargo');
            echo $this->Form->input('setor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
