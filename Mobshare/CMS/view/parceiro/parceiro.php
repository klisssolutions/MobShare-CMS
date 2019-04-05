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
<div class="titulo">SEJA UM PARCEIRO</div>
  <form id="form" method="post" enctype="multipart/form-data">
    <table>

      <tr>
              <td class="label2">
                  Nome:
              </td>
              <td class="input2">
                <input type="text" size="25" name="txtNome" required value="<?php echo($nome)?>">
              </td>
          </tr>
          <tr>
              <td class="label2">
                  Site:
              </td>
              <td class="input2">
                <input type="text" size="25" name="txtSite" value="<?php echo($site)?>">
              </td>
          </tr>
          <tr>
              <td class="label2">
                  Email:
              </td>
              <td class="input2">
                <input type="email" size="25" name="txtEmail" required value="<?php echo($email)?>">
              </td>
          </tr>
          <tr>
              <td class="label2">
                  Logo:
              </td>
              <td class="input2">
                <input type="file" name="imgLogo" id="foto" accept="image/*" value="<?php echo($logo)?>">
              </td>
          </tr>
          <tr>
              <td class="label2">
                  Descrição:
              </td>
              <td class="input2">
                <textarea name="txtDescricao" required><?php echo($descricao)?></textarea>
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