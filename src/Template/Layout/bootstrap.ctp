<!DOCTYPE html>
<html lang="pt-BR" ng-app>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script(['jquery.min','datepicker/bootstrap-datepicker','chart.min', 'bootstrap3-typeahead.min', 'angular-1.0.1.min']) ?>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>-->
    <?= $this->Html->css(['bootstrap/bootstrap.min', 'datepicker/datepicker']) ?>
    <?= $this->Html->css('customize') ?>

    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php if($usuarioLogado):?>
        <?=$this->element('cabecalho');?>
    <?php endif;?>
    <div class="container">        
        <div id="content">
            <?= $this->Flash->render() ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <?= $this->Html->script('bootstrap/bootstrap.min') ?>
    </div>
</body>
</html>
