<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_TERMOS);
    require_once(IMPORT_TERMOS_CONTROLLER);

    $controllerTermos = new controllerTermos();
    $termos[] = new Termos();
    $termos = $controllerTermos->listarTermos();
?>
<div class="titulo-func-lista">
GERENCIAMENTO DA PÁGINA TERMOS
</div>

<div class="botoes-termos-novo">
    <input type="button" value="Novo" class="btn-termo" onclick="atualizarTermo();">
</div>
<div class="botoes-termos-voltar">
    <input type="submit" value="Voltar" class="btn-termo" onclick="admPaginas();">
</div>
<div class="caixa-listagem">
<?php
if (is_array($termos) || is_object($termos))
{
    foreach($termos as $termo){
    
?>
<div class="listar-dados-termos">
    <div class="img-termo">
    <img src="view/imagens/notepad.png" heigth="65" width="65">
    <div>
    <div class="info-termo">
        <h1>Titulo:</h1>
        <p><?php echo($termo->getTitulo());?></p>
    </div>
    <div class="opcoes-termo">
    <a href="#" onclick="">
        <!--fazendo a transformação da imagem quando estiver ativado ou desativado! -->
        <?php
            if($termo->getAtivo() == 1){ 
        ?>
            <img src="view/imagens/checked.png" width="25" heigth="28">
        <?php
            }else{
        ?>
            <img src="view/imagens/cancel.png" width="25" heigth="28">
        <?php } ?> 
    </a>
    <!-- icone de edição -->
    <a href="#" onclick="selectRouter('termos', 'buscar', <?php echo($termo->getIdTermo());?>)">
         <img src="view/imagens/pencil.png" width="25" heigth="28">
    </a>
    <!-- ícone de deletar -->
    <a href="#" onclick="selectRouter('termos', 'excluir', <?php echo($termo->getIdTermo());?>)">
         <img src="view/imagens/trash.png" width="25" heigth="28" alt="apagar">
    </a>
    </div>
</div>
<?php
  }  }
?>
</div>