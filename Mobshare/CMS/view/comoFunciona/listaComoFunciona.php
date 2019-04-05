<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FUNCIONAMENTO);
    require_once(IMPORT_FUNCIONAMENTO_CONTROLLER);

    $controllerFuncionamento = new controllerFuncionamento();
    $funcionamentos[] = new Funcionamento();
    $funcionamentos = $controllerFuncionamento->listarFuncionamento();

?>
<div class="titulo">COMO FUNCIONA</div>

<div class="botoes">

    <input type="button" value="Novo" class="botao" onclick="cadastrarComoFunciona();">
    <input type="button" value="Voltar" class="botao" onclick="admPaginas();">

</div>

<?php
    foreach($funcionamentos as $funcionamento){
?>

<div class="listaDados">

    <div class="dados">
    
        Titulo:
        
    </div>
    <div class="infoDados">
    
        <?php echo($funcionamento->getTitulo());?>
    
    </div>
    <div class="dados">
    
        Descrição:
        
    </div>
    <div class="infoDados">
    
        <?php echo($funcionamento->getDescricao());?>
    
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('funcionamento', 'buscar', <?php echo($funcionamento->getIdFuncionamento());?>)">Editar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('funcionamento', 'excluir', <?php echo($funcionamento->getIdFuncionamento());?>)">Apagar</a>

    
    </div>
    
</div>
    <?php } ?>