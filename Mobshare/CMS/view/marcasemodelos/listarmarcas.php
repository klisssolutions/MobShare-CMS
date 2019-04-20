<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_MARCA);
    require_once(IMPORT_MARCA_CONTROLLER);

    $controllerMarca = new controllerMarca();
    $marcas[] = new Marca();
    $marcas = $controllerMarca->listarMarcas();
?>
<div class="titulo-func-lista">
GERENCIAMENTO DAS MARCAS
</div>

<div class="botoes-termos-novo">
    <input type="button" value="Novo" class="btn-termo" onclick="marcas();">
</div>
<div class="botoes-termos-voltar">
    <input type="submit" value="Voltar" class="btn-termo" onclick="marcaModelo();">
</div>
<div class="caixa-listagem">
<?php
if (is_array($marcas) || is_object($marcas))
{
    
    foreach($marcas as $marca){
    
?>
<div class="listar-dados-termos">
    <div class="img-termo">
    <img src="view/imagens/car.png" heigth="65" width="65">
    <div>
    <div class="info-termo">
        <h1>Marca:</h1>
        <p><?php echo($marca->getNomeMarca());?></p>
    </div>
    <div class="opcoes-termo">
    
    <!-- icone de edição -->
    <a href="#" onclick="selectRouter('marca', 'buscar', <?php echo($marca->getIdMarca());?>)">
         <img src="view/imagens/pencil.png" width="25" heigth="28">
    </a>
    <!-- ícone de deletar -->
    <a href="#" onclick="selectRouter('marca', 'excluir', <?php echo($marca->getIdMarca());?>)">
         <img src="view/imagens/trash.png" width="25" heigth="28" alt="apagar">
    </a>
    </div>
</div>
<?php
  }  }
?>
</div>