<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
  define("MARCADO", "checked");

  if(isset($pendencia)){
    $idPendencia = $pendencia->getIdPendencia();
    $nome = $pendencia->getNome();
    $id = $pendencia->getId();
    $motivo = $pendencia->getMotivo();
    $aberto = $pendencia->getAberto();
    $router = "router('pendenciaveiculo', 'atualizar', ".$idPendencia.")";
    
    //Verifica se tem as permissões para marcar as caixas de permissoes
    $chkAberto = ($aberto ? MARCADO : null);
  }
?>

<div class="titulo">APROVAÇÃO DE CADASTRO</div>
<form id="form" method="POST">
  <div class="label3">Nome:</div>
  <div class="label3"><?php echo($nome); ?></div>
  <div class="label3">ID:</div>
  <div class="label3"><?php echo($id); ?></div>
  <div class="label3"></div>
  <div class="label3">Motivo</div>
  <div class="label3"><textarea class="mensagem" name="txtmotivo"><?php echo($motivo); ?></textarea></div>

  <div class="label3">Aberto:</div>
  <div class="label3">
    <input type="checkbox" name="chkaberto" <?php echo($chkAberto); ?>>
  </div>

  <table>
          <tr>
              <td>
                <input type="submit" value="Aceitar" class="botao2" onclick="<?php echo($router);?>">
              </td>
          </tr>
  </table>
</form>