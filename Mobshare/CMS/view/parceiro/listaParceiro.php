<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_PARCEIRO);
    require_once(IMPORT_PARCEIRO_CONTROLLER);

    $controllerParceiro = new controllerParceiro();
    $parceiros[] = new Parceiro();
    $parceiros = $controllerParceiro->listarParceiro();
?>
<div class="titulo-func-lista">SEJA UM PARCEIRO</div>

<div class="botoes">

    <input type="button" value="Novo" class="btn-fun" onclick="cadastrarParceiro();">
    <input type="button" value="Voltar" class="btn-fun" onclick="admPaginas();">

</div>

<?php
    foreach($parceiros as $parceiro){
?>

<div class="listaDadosFunc">

    <div class="dados-func">
    
        Nome:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($parceiro->getNome());?>
    
    </div>
    <div class="dados-func">
    
        Site:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($parceiro->getSite());?>
    
    </div>
    
    <div class="opcao">

        <a href="#" onclick="">
        <!--fazendo a transformação da imagem quando estiver ativado ou desativado! -->
            <?php
                if($parceiro->getAtivo() == 0){ 
            ?>
                <img src="view/imagens/cancel.png" width="25" heigth="28">
            <?php
                }else{
            ?>
                <img src="view/imagens/checked.png" width="25" heigth="28">
            <?php } ?> 
        </a>
    
        <a href="#" onclick="selectRouter('parceiros', 'buscar', <?php echo($parceiro->getIdParceiro());?>)">
            <img src="view/imagens/pencil.png" width="25" heigth="28">
        </a>
    
        <a href="#" onclick="selectRouter('parceiros', 'excluir', <?php echo($parceiro->getIdParceiro());?>)">
            <img src="view/imagens/trash.png" width="25" heigth="28">
        </a>

    
    </div>
    
</div>
    <?php } ?>