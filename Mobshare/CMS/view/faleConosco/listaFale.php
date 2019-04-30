<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FALE_CONOSCO);
    require_once(IMPORT_FALE_CONOSCO_CONTROLLER);

    $controllerFaleConosco = new controllerFaleConosco();
    $FaleConosco[] = new FaleConosco();
    $FaleConosco = $controllerFaleConosco->listarFaleConosco();
   

?>

<div class="titulo-func-lista">GERENCIAMENTO DE FALE CONOSCO</div>





<?php
    foreach($FaleConosco as $Fale_Conosco){
?>




<div class="listaDados2">

    <div class="dados-func">
    
        Nome:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($Fale_Conosco->getNome());?>
    </div>
    <div class="dados-func">
    
        Email:
        
    </div>
    
    <div class="dados-resp-func">
    
        <?php echo($Fale_Conosco->getEmail());?>
    
    </div>
        <div class="dados-func">
    
        Assunto:
        
    </div>
        <div class="dados-resp-func">
    
        <?php echo($Fale_Conosco->getAssunto());?>
    
    </div>
        <div class="dados-func">
    
        Mensagem:
        
    </div>
        <div class="dados-resp-func">
    
        <?php echo($Fale_Conosco->getMensagem());?>
    
    </div>
    <div class="opcao">
        
    
        <a href="#" onclick="selectRouter('Fale_Conosco','excluir',<?php
        echo($Fale_Conosco->getIdFale_Conosco());?>)"><img src="view/imagens/trash.png" width="25" heigth="28"></a>

    
    </div>
    
</div>
<?php
    }
?>
