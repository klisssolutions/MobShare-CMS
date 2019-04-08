<?php 

    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_PENDENCIA);
    require_once(IMPORT_PENDENCIA_CONTROLLER);

    $controllerPendencia = new controllerPendencia();
    $pendencias[] = new Pendencia();
    $pendencias = $controllerPendencia->listarPendencia();

?>

<div class="titulo">APROVAÇÃO DE CADASTRO</div>

<?php
    foreach($pendencias as $pendencia){
?>

<div class="listaDados" onclick="verCadastro();">

    <div class="dados">
    
        Nome:
        
    </div>
    <div class="infoDados">
    
        Charlie Harper
    
    </div>
    <div class="dados">
    
        E-mail:
        
    </div>
    <div class="infoDados">
    
        charlie@gmail.com
    
    </div>

    
    
    <div class="opcao">
    
        <a href="#">Recusar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#">Aceitar</a>

    
    </div>

</div>

    <?php }?>