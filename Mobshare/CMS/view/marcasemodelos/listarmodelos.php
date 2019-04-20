<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_MODELO);
    require_once(IMPORT_MODELO_CONTROLLER);

    $controllerModelo = new controllerModelo();
    $modelos[] = new Modelo();
    $modelos = $controllerModelo->listarModelos();
?>
<div class="titulo-func-lista">
GERENCIAMENTO DOS MODELOS
</div>

<div class="botoes-termos-novo">
    <input type="button" value="Novo" class="btn-termo" onclick="modelos();">
</div>
<div class="botoes-termos-voltar">
    <input type="submit" value="Voltar" class="btn-termo" onclick="marcaModelo();">
</div>
<div class="caixa-listagem">
<?php
if (is_array($modelos) || is_object($modelos))
{
    foreach($modelos as $modelo){
    
?>
<div class="listar-dados-termos">
    <div class="img-termo">
    <img src="view/imagens/car.png" heigth="65" width="65">
    <div>
    <div class="info-termo">
        <h1>Modelo:</h1>
        <p><?php echo($modelo->getNomeModelo());?></p>
    </div>
    <div class="opcoes-termo">
    <!-- icone de edição -->
    <a href="#" onclick="selectRouter('modelo', 'buscar', <?php echo($modelo->getIdModelo());?>)">
         <img src="view/imagens/pencil.png" width="25" heigth="28"  alt="Editar" >
    </a>
    <!-- ícone de deletar -->
    <a href="#" onclick="selectRouter('modelo', 'excluir', <?php echo($modelo->getIdModelo());?>)">
         <img src="view/imagens/trash.png" width="25" heigth="28" alt="Apagar" >
    </a>
    </div>
</div>
<?php
  }  }
?>
</div>