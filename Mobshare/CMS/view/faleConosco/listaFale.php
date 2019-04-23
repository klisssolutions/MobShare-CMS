<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FALE_CONOSCO);
    require_once(IMPORT_FALE_CONOSCO_CONTROLLER);

    $controllerFaleConosco = new controllerFaleConosco();
    $FaleConosco[] = new FaleConosco();
    $FaleConosco = $controllerFaleConosco->listarFaleConosco();
   

?>

<div class="titulo">GERENCIAMENTO DE FALE CONOSCO</div>





<?php
    foreach($FaleConosco as $Fale_Conosco){
?>




<div class="listaDados">

    <div class="dados">
    
        Nome:
        
    </div>
    <div class="infoDados">
    
        <?php echo($Fale_Conosco->getNome());?>
    </div>
    <div class="dados">
    
        Email:
        
    </div>
    
    <div class="infoDados">
    
        <?php echo($Fale_Conosco->getEmail());?>
    
    </div>
        <div class="dados">
    
        Assunto:
        
    </div>
        <div class="infoDados">
    
        <?php echo($Fale_Conosco->getAssunto());?>
    
    </div>
        <div class="dados">
    
        Mensagem:
        
    </div>
        <div class="infoDados">
    
        <?php echo($Fale_Conosco->getMensagem());?>
    
    </div>
    <div class="opcao">
        
    
        <a href="#" onclick="selectRouter('Fale_Conosco','excluir',<?php
        echo($Fale_Conosco->getIdFale_Conosco());?>)">Apagar</a>

    
    </div>
    
</div>
<?php
    }
?>
