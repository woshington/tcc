<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Coordenador'), ['action' => 'edit', $coordenador->professor_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coordenador'), ['action' => 'delete', $coordenador->professor_id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordenador->professor_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coordenador'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coordenador'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modalidade'), ['controller' => 'Modalidade', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modalidade'), ['controller' => 'Modalidade', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professor'), ['controller' => 'Professor', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professor', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="coordenador view large-10 medium-9 columns">
    <h2><?= h($coordenador->professor_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Professor') ?></h6>
            <p><?= $coordenador->has('professor') ? $this->Html->link($coordenador->professor->nome, ['controller' => 'Professor', 'action' => 'view', $coordenador->professor->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Modalidade') ?></h6>
            <p><?= $coordenador->has('modalidade') ? $this->Html->link($coordenador->modalidade->descricao, ['controller' => 'Modalidade', 'action' => 'view', $coordenador->modalidade->id]) : '' ?></p>
        </div>
    </div>
</div>
