<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coordenador->professor_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coordenador->professor_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coordenador'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modalidade'), ['controller' => 'Modalidade', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modalidade'), ['controller' => 'Modalidade', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professor'), ['controller' => 'Professor', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professor', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="coordenador form large-10 medium-9 columns">
    <?= $this->Form->create($coordenador) ?>
    <fieldset>
        <legend><?= __('Edit Coordenador') ?></legend>
        <?php
            echo $this->Form->input('modalidade_id', ['options' => $modalidade]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
