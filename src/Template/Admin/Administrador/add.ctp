<?=$this->element('menuLateral')?>
<div class="administrador form large-10 medium-9 columns">
    <?= $this->Form->create($administrador) ?>
    <fieldset>
        <legend><?= __('Add Administrador') ?></legend>
        <?php
            echo $this->Form->input('usuario.nome');
            echo $this->Form->input('usuario.email');
            echo $this->Form->input('usuario.senha');
            echo $this->Form->input('usuario.ativo');
            echo $this->Form->input('usuario.matricula');
            echo $this->Form->input('cargo');
            echo $this->Form->input('setor');
            //echo $this->Form->input('administrador.usuario_id', ['options' => $usuario]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
