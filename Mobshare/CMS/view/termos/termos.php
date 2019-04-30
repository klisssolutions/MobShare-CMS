<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

  //Instância de níveis para colocar na combobox
  require_once(IMPORT_TERMOS);
  require_once(IMPORT_TERMOS_CONTROLLER);
  
  $controllerTermos = new controllerTermos();
  $termos[] = new Termos();
  $termos = $controllerTermos->listarTermos();


  $titulo = '';
  $texto = '';
  $sltAtivo = '';

  $router = "router('termos', 'inserir', '0')";

  if(isset($termo)){
    $titulo = $termo->getTitulo();
    $texto = $termo->getTexto();
    $sltAtivo = $termo->getAtivo();

    $router = "router('termos', 'atualizar', '".$termo->getIdTermo()."')";
  }


?>
<div class="titulo-termos-cad">CADASTRE UM NOVO TERMO</div>
<form id="form" method="post">
<table class="caixa-cad-termo">

  <tr>
      <td class="titulo-termo-cad">
          Titulo do Termo:
      </td>
      <td class="resp-termo">
        <input type="text" name="txtTitulo" class="input-func" value="<?php echo($titulo)?>">
      </td>
  </tr>
  <tr>
      <td class="titulo-termo-cad">
          Texto:
      </td>
      <td class="resp-termo">
        <input type="text" name="txtTexto" class="input-func" value="<?php echo($texto)?>">
      </td>
  </tr>
  <tr>
      <td class="titulo-termo-cad">
          Status:
      </td>
      <td class="resp-termo">
        <select class="input-func" name="sltAtivo">
            <option value="">Selecione um modo</option>
            <option value="1">Ativado</option>
            <option value="0">Desativado</option>
        </select>
      </td>
  </tr>
  <tr>
      <td class="label2">
        <input type="submit" value="Voltar" class="btn-fun" onclick="listaTermos();">
      </td>
      <td class="input2">
        <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router)?>">
      </td>
  </tr>

</table>
</form>