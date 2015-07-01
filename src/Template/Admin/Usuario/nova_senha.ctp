<div class="panel panel-default">
  <div class="panel-heading">Nova senha para <strong><?=$usuario->nome?></strong></div>
  <div class="panel-body">
    <?= $this->Form->create($usuario) ?>
        <div class="form-group">
            <?=$this->Form->password('senha', ['div'=>false, 'class'=>'form-control', 'value'=>'']);?>
        </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
    </div>
</div>