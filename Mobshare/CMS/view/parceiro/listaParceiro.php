<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_PARCEIRO);
    require_once(IMPORT_PARCEIRO_CONTROLLER);

    $controllerParceiro = new controllerParceiro();
    $parceiros[] = new Parceiro();
    $parceiros = $controllerParceiro->listarParceiro();
?>
<div class="titulo">GERENCIAMENTO DE NIVEIS</div>

<div class="botoes">

    <input type="button" value="Novo" class="botao" onclick="cadastrarParceiro();">
    <input type="button" value="Voltar" class="botao" onclick="admPaginas();">

</div>

<?php
    foreach($parceiros as $parceiro){
?>

<div class="listaDados">

    <div class="dados">
    
        Nome:
        
    </div>
    <div class="infoDados">
    
        <?php echo($parceiro->getNome());?>
    
    </div>
    <div class="dados">
    
        Site:
        
    </div>
    <div class="infoDados">
    
        <?php echo($parceiro->getSite());?>
    
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('parceiros', 'buscar', <?php echo($parceiro->getIdParceiro());?>)">Editar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('parceiros', 'excluir', <?php echo($parceiro->getIdParceiro());?>)">Apagar</a>

    
    </div>
    
</div>
    <?php } ?>