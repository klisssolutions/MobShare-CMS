<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 
    
    require_once(IMPORT_NIVEL);
    require_once(IMPORT_NIVEL_CONTROLLER);
    
    $controllerNivel = new controllerNivel();
    $niveis[] = new Nivel();
    $niveis = $controllerNivel->listarNiveis();
?>

<div class="titulo-func-lista">GERENCIAMENTO DE NIVEIS</div>

<div class="botoes-func">

    <input type="button" value="Novo" class="btn-fun" onclick="cadastrarNivel(0);">
    <input type="button" value="Voltar" class="btn-fun" onclick="gerenciarFuncionario();">

</div>
<?php
    foreach($niveis as $nivel){
?>
<div class="listaDadosFunc">

    <div class="dados-func">
    
        ID Nível:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($nivel->getIdNivel());?>
    
    </div>
    <div class="dados-func">
    
        Nível:
        
    </div>
    <div class="dados-resp-func">
        <?php echo($nivel->getNome());?>
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('niveis', 'buscar', <?php echo($nivel->getIdNivel());?>)">
        <img src="view/imagens/pencil.png" width="25" heigth="28"></a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('niveis', 'excluir', <?php echo($nivel->getIdNivel());?>)">
        <img src="view/imagens/delete.png" width="25" heigth="28">
        </a>

    </div>
</div>
<?php
    }
?>