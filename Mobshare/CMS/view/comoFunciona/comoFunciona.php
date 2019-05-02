<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

  $titulo = '';
  $foto = '';
  $descricao = '';

  $router = "router('FUNCIONAMENTO', 'INSERIR', '0')";

  if(isset($funcionamento)){
    $titulo = $funcionamento->getTitulo();
    $foto = "../arquivos/" . $funcionamento->getFoto();
    $descricao = $funcionamento->getDescricao();
    $idFuncionamento = $funcionamento->getIdFuncionamento();

    $router = "router('FUNCIONAMENTO', 'ATUALIZAR', '".$funcionamento->getIdFuncionamento()."')";
  }
?>

<div class="titulo-func-lista">COMO FUNCIONA</div>
  <form id="form" method="post" enctype="multipart/form-data">
    <table class="func-cad">
          <tr>
              <td class="titulo-func-cad">
                  Titulo:
              </td>
              <td class="txt-func">
                <input type="text" size="25" class="input-func" name="txtTitulo" required value="<?php echo($titulo)?>">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Foto:
              </td>
              <td class="txt-func">
                <input type="file" name="imgFoto" id="foto" accept="image/*" onchange="preview(this)" value="<?php echo($foto)?>">
              </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <img src="<?php echo($foto); ?>" id="prev">
            </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Descrição:
              </td>
              <td class="txt-func">
                <textarea name="txtDescricao" class="input-func2" required><?php echo($descricao)?></textarea>
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                  Status:
              </td>
              <td class="resp-termo">
                <select class="slt-func" name="sltAtivo" required>
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
                <input type="button" value="Voltar" class="btn-fun" onclick="comoFunciona();">
              </td>
              <td class="titulo-func-cad">
                <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router); ?>">
              </td>
          </tr>
  </table>
</form>  