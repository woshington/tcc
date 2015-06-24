<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Modalidade'), ['controller'=>'modalidade', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Curso'), ['controller'=>'curso', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Turma'), ['controller'=>'turma', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Eixo'), ['controller'=>'eixo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Sala'), ['controller'=>'sala', 'action' => 'index']) ?></li>
        <hr />
        <li><?= $this->Html->link(__('Administrador'), ['controller' => 'administrador', 'action' => 'index']) ?></li>        
        <li><?= $this->Html->link(__('Professor'), ['controller' => 'Professor', 'action' => 'index']) ?></li>        
    </ul>
</div>