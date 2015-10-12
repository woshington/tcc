<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listagem <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Turmas'), ['controller'=>'turma', 'action' => 'index']) ?></li>            
            <li><?= $this->Html->link(__('Faltas'), ['controller'=>'aula', 'action' => 'verFaltas']) ?></li>
            <li><?= $this->Html->link(__('Reposições'), ['controller'=>'ReposicaoAntecipacao', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Disciplinas'), ['controller'=>'professor', 'action' => 'minhasDisciplinas']) ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solicitar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Reposição'), ['prefix'=>false, 'controller'=>'ReposicaoAntecipacao', 'action' => 'solicitarReposicao']) ?></li>            
            <li><?= $this->Html->link(__('Antecipação'), ['prefix'=>false, 'controller'=>'ReposicaoAntecipacao', 'action' => 'solicitarAntecipacao']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$usuarioLogado['nome']?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <?=$this->Html->link('Meu perfil', ['prefix'=>false, 'controller'=>'usuario', 'action'=>'view'])?>
            </li>            
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Sair'), ['prefix'=>false, 'controller'=>'usuario', 'action' => 'logout']) ?></li>            
          </ul>
        </li>
      </ul>
    </div>