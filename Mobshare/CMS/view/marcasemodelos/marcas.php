<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 


  require_once(IMPORT_MARCA);
  require_once(IMPORT_MARCA_CONTROLLER);

  $controllerMarca = new controllerMarca();
  $marcas[] = new Marca();
  $marcas = $controllerMarca->listarMarcas();


  $nomeMarca = '';

  $router = "router('marca', 'inserir', '0')";

  if(isset($marca)){
    $nomeMarca = $marca->getNomeMarca();

    $router = "router('marca', 'atualizar', '".$marca->getIdMarca()."')";

  }


?>

<div class="titulo-func-lista">GERENCIAMENTO DAS MARCAS</div>

<form id="form" method="post">

    <table class="func-cad">
        <tr>
            <td class="titulo-func-cad">
            Nome da Marca:
            </td>
            <td class="txt-func">
              <input type="text" class="input-func" name="txtMarca" maxlength="15" value="<?php echo($nomeMarca)?>" size="20" required>
            </td>
        </tr>
        
        <tr>
            <td class="titulo-func-cad">
            <input type="button" value="Voltar" class="btn-fun" onclick="listaMarcas();">
            </td>
            <td class="titulo-func-cad">
              <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router)?>">
            </td>
        </tr>
    </table>

</form>
