<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

  //Instância de níveis para colocar na combobox
  require_once(IMPORT_MODELO);
  require_once(IMPORT_MODELO_CONTROLLER);

  require_once(IMPORT_MARCA);
  require_once(IMPORT_MARCA_CONTROLLER);
  
  $controllerModelo = new controllerModelo();
  $modelos[] = new Modelo();
  $modelos = $controllerModelo->listarModelos();

  //instaciando os imports das marcas
  $controllerMarca = new controllerMarca();
  $marcas[] = new Marca();
  $marcas = $controllerMarca->listarMarcas();


  $nomeModelo = '';
  $idMarca = '';

  $router = "router('modelo', 'inserir', '0')";

  if(isset($modelo)){
    $nomeModelo = $modelo->getNomeModelo();
    $idMarca = $modelo->getIdMarca();

    $router = "router('modelo', 'atualizar', '".$modelo->getIdModelo()."')";

  }


?>

<div class="titulo-func-lista">GERENCIAMENTO DE MODELO</div>

<form id="form" method="post">

    <table class="func-cad">
        <tr>
            <td class="titulo-func-cad">
            Modelo:
            </td>
            <td class="txt-func">
              <input type="text" class="input-func" name="txtModelo" maxlength="15" value="<?php echo($nomeModelo)?>" size="20" required>
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
            Marca:
            </td>
            <td class="txt-func">
              <select   class="slt-func" name="cbbMarca" required>
                <option value="">Selecione um nível</option>
                <?php 
                foreach($marcas as $marca){
                    $selected = ($idMarca == $marca->getIdMarca() ? "selected" : null);
                ?>
                  
                  <option value="<?php echo($marca->getIdMarca()); ?>" <?php echo($selected); ?>><?php echo($marca->getNomeMarca()); ?></option>

                <?php } ?>
              </select>
            </td>
        </tr>
        
        <tr>
            <td class="titulo-func-cad">
            <input type="button" value="Voltar" class="btn-fun" onclick="listaModelos();">
            </td>
            <td class="titulo-func-cad">
              <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router)?>">
            </td>
        </tr>
    </table>

</form>
