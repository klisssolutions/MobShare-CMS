<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 

  //Instância de níveis para colocar na combobox
  require_once(IMPORT_NIVEL);
  require_once(IMPORT_NIVEL_CONTROLLER);
  
  $controllerNivel = new controllerNivel();
  $niveis[] = new Nivel();
  $niveis = $controllerNivel->listarNiveis();


  $nome = '';
  $senha = '';
  $idNivel = '';

  $router = "router('funcionarios', 'inserir', '0')";

  if(isset($funcionario)){
    $nome = $funcionario->getNome();
    $senha = $funcionario->getSenha();
    $idNivel = $funcionario->getIdNivel();

    $router = "router('funcionarios', 'atualizar', '".$funcionario->getIdUsuarioWeb()."')";

  }


?>

<div class="titulo-func-lista">GERENCIAMENTO DE FUNCIONARIO</div>

<form id="form" method="post">

    <table class="func-cad">
        <tr>
            <td class="titulo-func-cad">
            Nome:
            </td>
            <td class="txt-func">
              <input type="text" class="input-func" name="txtnome" maxlength="15" value="<?php echo($nome)?>" size="20" required>
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Senha
            </td>
            <td class="txt-func">
              <input type="password"  class="input-func" name="txtsenha" maxlength="10" value="<?php echo($senha)?>" size="20" required>
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
            Nivel:
            </td>
            <td class="txt-func">
              <select   class="slt-func" name="cbbnivel"required>
                <option value="">Selecione um nível</option>
                <?php foreach($niveis as $nivel){ 
                        $selected = ($idNivel == $nivel->getIdNivel() ? "selected" : null);
                ?>
                  
                  <option value="<?php echo($nivel->getIdNivel()); ?>" <?php echo($selected); ?>><?php echo($nivel->getNome()); ?></option>
                <?php } ?>
              </select>
            </td>
        </tr>
        
        <tr>
            <td class="titulo-func-cad">
            <input type="button" value="Voltar" class="btn-fun" onclick="gerenciarFuncionario();">
            </td>
            <td class="titulo-func-cad">
              <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router)?>">
            </td>
        </tr>
    </table>

</form>
