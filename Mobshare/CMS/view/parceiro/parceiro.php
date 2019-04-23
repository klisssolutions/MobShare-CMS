<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

    $nome = '';
    $email = '';
    $site = '';
    $descricao = '';
    $logo = '';
    $idParceiro = '';

  $router = "router('PARCEIROS', 'INSERIR', '0')";

  if(isset($parceiro)){
    $nome = $parceiro->getNome();
    $email = $parceiro->getEmail();
    $site = $parceiro->getSite();
    $descricao = $parceiro->getDescricao();
    $logo = $parceiro->getLogo();
    $idParceiro = $parceiro->getIdParceiro();

    $router = "router('parceiros', 'atualizar', '".$parceiro->getIdParceiro()."')";

  }
?>
<div class="titulo-func-lista">SEJA UM PARCEIRO</div>
  <form id="form" method="post" enctype="multipart/form-data">
    <table class="func-cad">

      <tr>
              <td class="titulo-func-cad">
                  Nome:
              </td>
              <td class="txt-func">
                <input type="text" size="25" class="input-func" name="txtNome" required value="<?php echo($nome)?>">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Site:
              </td>
              <td class="txt-func">
                <input type="text" size="25" class="input-func" name="txtSite" value="<?php echo($site)?>">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Email:
              </td>
              <td class="txt-func">
                <input type="email" size="25" class="input-func" name="txtEmail" required value="<?php echo($email)?>">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Logo:
              </td>
              <td class="txt-func">
                <input type="file" name="imgLogo" id="foto" accept="image/*" value="<?php echo($logo)?>">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Descrição:
              </td>
              <td class="txt-func">
                <textarea name="txtDescricao" maxlength="250" required><?php echo($descricao)?></textarea>
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Status:
              </td>
              <td class="resp-termo">
                <select class="slt-func" name="sltAtivo">
                    <option>Selecione um modo</option>
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
              </td>
          </tr>
          <tr>
              <td class="label2">
                <input type="submit" value="Voltar" class="botao2" onclick="admPaginas();">
              </td>
              <td class="input2">
                <input type="submit" value="Enviar" class="botao2" onclick="<?php echo($router); ?>">
              </td>
          </tr>
  </table>
</form>  