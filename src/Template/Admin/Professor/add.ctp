<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Professor</div>
  <div class="panel-body">
    <?= $this->Form->create($professor) ?>
    <div class="form-group">
        <?=$this->Form->input('usuario.nome', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('usuario.email', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('usuario.matricula', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('qualificacao', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('eixo_id', ['options'=>$eixo, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
    </div>
</div>