<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Curso'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modalidade'), ['controller' => 'Modalidade', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modalidade'), ['controller' => 'Modalidade', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Turma'), ['controller' => 'Turma', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Turma'), ['controller' => 'Turma', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="curso form large-10 medium-9 columns">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Add Curso') ?></legend>
        <?php
            echo $this->Form->input('descricao', ['label'=>'Descrição']);
            echo $this->Form->input('sigla');
            echo $this->Form->input('modalidade_id', ['options' => $modalidade]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
