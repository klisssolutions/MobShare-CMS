<?php 

    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_PENDENCIA);
    require_once(IMPORT_PENDENCIA_CONTROLLER);

    $controllerPendencia = new controllerPendencia();
    $pendencias[] = new Pendencia();
    $pendencias = $controllerPendencia->listarPendencia("USUARIO");

?>

<div class="titulo">APROVAÇÃO DE CADASTRO</div>

<?php
    foreach($pendencias as $pendencia){
?>

<div class="listaDados">

    <div class="dados">
    
        Nome:
        
    </div>
    <div class="infoDados">
    
        <?php echo($pendencia->getNome()); ?>
    
    </div>
    <div class="dados">
    
        ID:
        
    </div>
    <div class="infoDados">
    
    <?php echo($pendencia->getId()); ?>
    
    </div>

    <div class="opcao">
    
        <a href="#" onclick="selectRouter('pendenciausuario', 'buscar', <?php echo($pendencia->getIdPendencia());?>);">Editar</a>
    
    </div>

</div>

    <?php }?>