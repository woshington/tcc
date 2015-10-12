<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <input type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TCC</a>
    </div>    
    <?php 
      if($usuarioLogado['coordenador']){
          echo $this->element('menuCoordenador');
      }elseif($usuarioLogado['professor']){
        echo $this->element('menuProfessor');
      }else{
        echo $this->element('menu');
      }
    ?>    
    
  </div><!-- /.container-fluid -->
</nav>