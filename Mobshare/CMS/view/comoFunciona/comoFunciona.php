<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

  $titulo = '';
  $foto = '';
  $descricao = '';

  $router = "router('FUNCIONAMENTO', 'INSERIR', '0')";

  if(isset($funcionamento)){
    $titulo = $funcionamento->getTitulo();
    $foto = $funcionamento->getFoto();
    $descricao = $funcionamento->getDescricao();
    $idFuncionamento = $funcionamento->getIdFuncionamento();

    $router = "router('FUNCIONAMENTO', 'ATUALIZAR', '".$funcionamento->getIdFuncionamento()."')";

  }
?>
<div class="titulo">COMO FUNCIONA</div>
  <form id="form" method="post" enctype="multipart/form-data">
    <table>

      <tr>
              <td class="label2">
                  Titulo:
              </td>
              <td class="input2">
                <input type="text" size="25" name="txtTitulo" required value="<?php echo($titulo)?>">
              </td>
          </tr>
          <tr>
              <td class="label2">
                  Foto:
              </td>
              <td class="input2">
                <input type="file" name="imgFoto" id="foto" accept="image/*" value="<?php echo($foto)?>">
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