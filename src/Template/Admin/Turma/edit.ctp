<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Turma</div>
  <div class="panel-body">
    <?= $this->Form->create($turma) ?>
    <div class="form-group">
        <?=$this->Form->input('nome', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('ano', ['options'=>$anos, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('turno', ['options'=>$turnos, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('curso_id', ['options'=>$curso, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('sala_id', ['options'=>$sala, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('ativo', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
</div>
