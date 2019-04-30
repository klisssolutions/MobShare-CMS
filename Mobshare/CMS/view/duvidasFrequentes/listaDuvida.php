<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_DUVIDAS_FREQUENTES);
    require_once(IMPORT_DUVIDAS_FREQUENTES_CONTROLLER);

    $controllerDuvidasFrequentes = new controllerDuvidasFrequentes();
    $duvidas[] = new duvidasFrequentes();
    $duvidas = $controllerDuvidasFrequentes->listarDuvidas();

    

?>


<div class="titulo-func-lista">DUVIDAS FREQUENTES</div>

<div class="botoes-func">

    <input type="button" value="Novo" class="btn-fun" onclick="cadastrarDuvida();">
    <input type="button" value="Voltar" class="btn-fun" onclick="admPaginas();">
    

</div>



<?php
    foreach($duvidas as $duvida){
?>





<div class="listaDadosFunc">

    <div class="dados-func">
    
        Pergunta:
        
    </div>
    <div class="dados-resp-func">
    
      <?php echo($duvida->getPerguntas());?>
    
    </div>
    <div class="dados-func">
    
        Resposta:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($duvida->getResposta());?>
    
    </div>
    
    <div class="opcao">
        
        <a href="#" onclick="">
        <!--fazendo a transformação da imagem quando estiver ativado ou desativado! -->
        <?php
            if($duvida->getAtivo() == 1){ 
        ?>
            <img src="view/imagens/checked.png" width="25" heigth="28">
        <?php
            }else{
        ?>
            <img src="view/imagens/cancel.png" width="25" heigth="28">
        <?php } ?> 
    </a>
    
        <a class="opcao2" href="#" onclick="selectRouter('duvidas','buscar',<?php
        echo($duvida->getIdPergunta());?>)"><img src="view/imagens/pencil.png" width="25" heigth="28"></a>
    
        <a href="#" class="opcao2" onclick="selectRouter('duvidas','excluir',<?php
        echo($duvida->getIdPergunta());?>)"><img src="view/imagens/trash.png" width="25" heigth="28"></a>

    
    </div>
    
</div>


<?php
    }
?>