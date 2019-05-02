<?php 

    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_PENDENCIA);
    require_once(IMPORT_PENDENCIA_CONTROLLER);

    $controllerPendencia = new controllerPendencia();
    $pendencias[] = new Pendencia();
    $pendencias = $controllerPendencia->listarPendencia("USUARIO");

?>

<div class="titulo-func-lista">APROVAÇÃO DE CADASTRO</div>

<?php
    foreach($pendencias as $pendencia){
?>

<div class="listaDadosFunc">

    <div class="dados-func">
    
        Nome:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($pendencia->getNome()); ?>
    
    </div>
    <div class="dados-func">
    
        ID:
        
    </div>
    <div class="dados-resp-func">
    
    <?php echo($pendencia->getId()); ?>
    
    </div>

    <div class="opcao">
    
        <a href="#" onclick="selectRouter('pendenciausuario', 'buscar', <?php echo($pendencia->getIdPendencia());?>);">
    <img src="view/imagens/pencil.png" width="28" heigth="28"></a>
    
    </div>

</div>

    <?php }?>