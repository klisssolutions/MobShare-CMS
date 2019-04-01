<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FUNCIONARIO);
    require_once(IMPORT_FUNCIONARIO_CONTROLLER);

    $controllerFuncionario = new controllerFuncionario();
    $funcionarios[] = new Funcionario();
    $funcionarios = $controllerFuncionario->listarFuncionario();
?>

<div class="titulo">GERENCIAMENTO DE FUNCIONARIO</div>

<div class="botoes">

    <input type="button" value="Novo" class="botao" onclick="cadastrarFunc();">
    <input type="button" value="Voltar" class="botao" onclick="gerenciarFuncionario();">

</div>

<?php
    foreach($funcionarios as $funcionario){
?>

<div class="listaDados">

    <div class="dados">
    
        Matricula:
        
    </div>
    <div class="infoDados">
    
        <?php echo($funcionario->getIdFuncionario());?>
    
    </div>
    <div class="dados">
    
        Nome:
        
    </div>
    <div class="infoDados">
    
    <?php echo($funcionario->getNome());?>
    
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('funcionarios', 'buscar', <?php echo($funcionario->getIdFuncionario());?>)">Editar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('funcionarios', 'excluir', <?php echo($funcionario->getIdFuncionario());?>)">Apagar</a>
    
    </div>
    
</div>

<?php
    }
?>