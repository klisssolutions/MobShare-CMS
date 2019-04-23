<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FUNCIONAMENTO);
    require_once(IMPORT_FUNCIONAMENTO_CONTROLLER);

    $controllerFuncionamento = new controllerFuncionamento();
    $funcionamentos[] = new Funcionamento();
    $funcionamentos = $controllerFuncionamento->listarFuncionamento();

?>
<div class="titulo-func-lista">COMO FUNCIONA</div>

<div class="botoes-func">

    <input type="button" value="Novo" class="btn-fun" onclick="cadastrarComoFunciona();">
    <input type="button" value="Voltar" class="btn-fun" onclick="admPaginas();">

</div>

<?php
    foreach($funcionamentos as $funcionamento){
?>

<div class="listaDadosFunc">

    <div class="dados-func">
    
        Titulo:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($funcionamento->getTitulo());?>
    
    </div>
    <div class="dados-func">
    
        Descrição:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($funcionamento->getDescricao());?>
    
    </div>
    
    <div class="opcao">
        <a href="#" onclick="">
        <!--fazendo a transformação da imagem quando estiver ativado ou desativado! -->
            <?php
                if($funcionamento->getAtivo() == 0){ 
            ?>
                <img src="view/imagens/cancel.png" width="25" heigth="28">
            <?php
                }else{
            ?>
                <img src="view/imagens/checked.png" width="25" heigth="28">
            <?php } ?> 
        </a>
    
        <a href="#" onclick="selectRouter('funcionamento', 'buscar', <?php echo($funcionamento->getIdFuncionamento());?>)">
            <img src="view/imagens/pencil.png" width="25" heigth="28">
        </a>
    
        <a href="#" onclick="selectRouter('funcionamento', 'excluir', <?php echo($funcionamento->getIdFuncionamento());?>)">
            <img src="view/imagens/trash.png" width="25" heigth="28">
        </a>

    
    </div>
    
</div>
    <?php } ?>