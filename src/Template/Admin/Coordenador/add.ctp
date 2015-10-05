<script type="text/javascript">
    $(function(){        
        $('#eixo').change(function(){            
            $.getJSON('../professor/getProfessores/'+$(this).val(), function( professores ) {

                var opcoes = '<option value>Escolha um professor</option>';
                $.each( professores, function( i, item ) {
                    opcoes += '<option value='+item.id+'>'+item.usuario.nome+'</option>';
                });

                $('#professores').html(opcoes).show();
            //$('#turmasId').html();            
            });
        });
    });
</script>
<div class="col-md-12"> 
<div class="panel panel-default">
  <div class="panel-heading">Coordenador</div>
  <div class="panel-body">
    <?=$this->Form->create($coordenador)?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('eixo_id', ['class'=>'form-control', 'options'=>$eixo, 'empty'=>'Escolha um eixo', 'id'=>'eixo']);?>
            </div>            
        </div>     
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('modalidade_id', ['class'=>'form-control', 'options'=>$modalidade, 'empty'=>'Escolha uma modalidade', 'id'=>'modalidade', 'label'=>'Modalidade']);?>
            </div>
        </div>
       <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('professor_id', ['class'=>'form-control', 'options'=>[], 'empty'=>'Escolha um professor', 'id'=>'professores', 'type'=>'select']);?>
            </div>            
        </div>      
    </div>
    <div class="row">    
    <div class="col-md-2">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-ok"><i> Confirmar</i></span> 
            </button>    
        </div>
    </div>
    </div>
    <?=$this->Form->end()?>
  </div>
</div>
</div>