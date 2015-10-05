<script type="text/javascript">
    $(function(){
        $('#btnAprovar').click(function(){
            if(confirm('Aprovar reposição?')){
                $('#status').val('A');
                $('#reposicaoForm').submit();
            }
            
        });
        $('#btnRejeitar').click(function(){
            if(confirm('Rejeitar reposição?')){
                $('#status').val('R');
                $('#reposicaoForm').submit();
            }
        });
    });
</script>
<div class="panel panel-default">
  <div class="panel-heading">Reposição pendente/ <?=$reposicaoAntecipacao->aula['professor']?></div>
  <div class="panel-body">
    <?=$this->Form->create($reposicaoAntecipacao, ['id'=>'reposicaoForm'])?>
    <?=$this->Form->input('id');?>
    <?=$this->Form->input('status', ['type'=>'hidden', 'id'=>'status']);?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('data', ['div'=>false, 'class'=>'form-control', 'label'=>'Data', 'disabled'=>true, 'value'=>$reposicaoAntecipacao->aula['data']]);?>
            </div>    
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('turma', ['div'=>false, 'class'=>'form-control', 'label'=>'Turma', 'disabled'=>true, 'value'=>$reposicaoAntecipacao->aula['turma']]);?>
            </div>    
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('aula', ['div'=>false, 'class'=>'form-control', 'label'=>'Aula', 'disabled'=>true, 'value'=>$reposicaoAntecipacao->aula['aula']]);?>
            </div>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=$this->Form->input('justificativa', ['div'=>false, 'class'=>'form-control', 'label'=>'justificativa', 'disabled'=>true]);?>
            </div>    
        </div>
    </div>   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?=$this->Form->input('dataReposicao', ['type'=>'text', 'div'=>false, 'class'=>'form-control', 'label'=>'Repor em', 'disabled'=>true]);?>
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?=$this->Form->input('aulaReposicao', ['div'=>false, 'class'=>'form-control', 'label'=>'Aula', 'disabled'=>true]);?>
            </div>    
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=$this->Form->input('observacao', ['div'=>false, 'class'=>'form-control', 'label'=>'Observação']);?>
            </div>    
        </div>
    </div>   
    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <a href="#" class="btn btn-success" id="btnAprovar">Aprovar</a>
            </div>                
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <a href="#" class="btn btn-danger" id="btnRejeitar">Rejeitar</a>
            </div>                
        </div>        
    </div>       
    <?=$this->Form->end();?>
</div>
