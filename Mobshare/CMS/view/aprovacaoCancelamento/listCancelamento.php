<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 
    
    require_once(IMPORT_CANCELAMENTO);
    require_once(IMPORT_CANCELAMENTO_CONTROLLER);
    
    $controllerCancelamento = new controllerCancelamento();
    $cancelamentos[] = new Cancelamento();
    $cancelamentos = $controllerCancelamento->listarCancelamentosNaoConfirmados();
?>

<div class="titulo-func-lista">APROVAÇÃO DE CANCELAMENTO</div>

<div class="botoes-func">

    <input type="button" value="Voltar" class="btn-fun" onclick="gerenciarFuncionario();">

</div>
<?php


    if($cancelamentos != null){
        foreach($cancelamentos as $cancelamento){

?>
<div class="caixaDadosCancelamento">

    <div class="dados-cancelamento">
    
        ID Cancelamento:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($cancelamento->getIdCancelamento());?>
    
    </div>

    <div class="dados-cancelamento">
    
        Nome Solicitante:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($cancelamento->getNome());?>
    
    </div>

    <div class="dados-cancelamento">
    
        ID Solicitante:
        
    </div>    
    
    <div class="dados-resp-func">
        <?php echo($cancelamento->getIdCliente());?>
    </div>    
    
    
    <div class="dados-cancelamento">
    
        Motivo:
        
    </div>
    <div class="dados-resp-func">
        <?php echo($cancelamento->getMotivo());?>
    </div>




    <div class="segOpcao">
        <div class="opcaoConfirm">
        
            <a href="#" onclick="selectRouter('cancelamento', 'aceitar', <?php echo($cancelamento->getIdCancelamento());?>)">
            <img src="view/imagens/check.png" width="25" heigth="28"></a>
        
        </div>
        <div class="opcaoConfirm">
        
            <a href="#" onclick="selectRouter('cancelamento', 'recusar', <?php echo($cancelamento->getIdCancelamento());?>)">
            <img src="view/imagens/delete.png" width="25" heigth="28">
            </a>

        </div>
    </div>




</div>
<?php
        }
    }
?>