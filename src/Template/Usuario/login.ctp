<div class="login col-md-4">
	<div class="panel panel-default">
	  <div class="panel-heading">Login</div>
		  <div class="panel-body">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create('usuario', ['class'=>"form-signin"]) ?>

			<div class="form-group">
		        <?=$this->Form->input('email', ['div'=>false, 'class'=>'form-control']);?>
		    </div>
		    <div class="form-group">
		        <?=$this->Form->input('senha', ['div'=>false, 'class'=>'form-control', 'type'=>'password']);?>
		    </div>
		    
			<div class="form-group">
			    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
</div>