<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuario'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Administrador'), ['controller' => 'Administrador', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Administrador'), ['controller' => 'Administrador', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professor'), ['controller' => 'Professor', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professor', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="usuario form large-10 medium-9 columns">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Edit Usuario') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('email');
            echo $this->Form->input('senha');
            echo $this->Form->input('ativo');
            echo $this->Form->input('matricula');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
