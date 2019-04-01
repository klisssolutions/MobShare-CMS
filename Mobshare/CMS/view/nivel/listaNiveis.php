<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 
    
    require_once(IMPORT_NIVEL);
    require_once(IMPORT_NIVEL_CONTROLLER);
    
    $controllerNivel = new controllerNivel();
    $niveis[] = new Nivel();
    $niveis = $controllerNivel->listarNiveis();
?>

<div class="titulo">GERENCIAMENTO DE NIVEIS</div>

<div class="botoes">

    <input type="button" value="Novo" class="botao" onclick="cadastrarNivel(0);">
    <input type="button" value="Voltar" class="botao" onclick="gerenciarFuncionario();">

</div>
<?php
    foreach($niveis as $nivel){
?>
<div class="listaDados">

    <div class="dados">
    
        ID Nível:
        
    </div>
    <div class="infoDados">
    
        <?php echo($nivel->getIdNivel());?>
    
    </div>
    <div class="dados">
    
        Nível:
        
    </div>
    <div class="infoDados">
        <?php echo($nivel->getNome());?>
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('niveis', 'buscar', <?php echo($nivel->getIdNivel());?>)">Editar</a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('niveis', 'excluir', <?php echo($nivel->getIdNivel());?>)">Apagar</a>

    </div>
</div>
<?php
    }
?>