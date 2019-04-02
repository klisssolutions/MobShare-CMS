<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_FUNCIONARIO);
    require_once(IMPORT_FUNCIONARIO_CONTROLLER);

    $controllerFuncionario = new controllerFuncionario();
    $funcionarios[] = new Funcionario();
    $funcionarios = $controllerFuncionario->listarFuncionario();
?>

<div class="titulo-func-lista">GERENCIAMENTO DE FUNCIONARIOS</div>

<div class="botoes-func">

    <input type="button" value="Novo" class="btn-fun"  onclick="cadastrarFunc();">
    <input type="button" value="Voltar" class="btn-fun" onclick="gerenciarFuncionario();">

</div>

<?php
    foreach($funcionarios as $funcionario){
?>

<div class="listaDadosFunc">

    <div class="dados-func">
    
        Matricula:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($funcionario->getIdUsuarioWeb());?>
    
    </div>
    <div class="dados-func">
    
        Nome:
        
    </div>
    <div class="dados-resp-func">
    
    <?php echo($funcionario->getNome());?>
    
    </div>
    <div class="opcao">
    
    <a href="#" onclick="selectRouter('funcionarios', 'excluir', <?php echo($funcionario->getIdUsuarioWeb());?>)">
        <img src="view/imagens/delete.png" width="28" heigth="28">
    </a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('funcionarios', 'buscar', <?php echo($funcionario->getIdUsuarioWeb());?>)">
         <img src="view/imagens/pencil.png" width="25" heigth="28">
        </a>
    
    </div>
    
</div>

<?php
    }
?>