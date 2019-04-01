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

    $router = "router('funcionarios', 'atualizar', '".$funcionario->getIdFuncionario()."')";

  }


?>

<div class="titulo">GERENCIAMENTO DE FUNCIONARIO</div>

<form id="form" method="post">

    <table>
        <tr>
            <td class="label2">
            Nome:
            </td>
            <td class="input2">
              <input type="text" name="txtnome" maxlength="15" value="<?php echo($nome)?>" size="20" required>
            </td>
        </tr>
        <tr>
            <td class="label2">
            Nivel:
            </td>
            <td class="input2">
              <select name="cbbnivel"required>
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
            <td class="label2">
                Senha
            </td>
            <td class="input2">
              <input type="password" name="txtsenha" maxlength="10" value="<?php echo($senha)?>" size="20" required>
            </td>
        </tr>
        <tr>
            <td class="label2">
            <input type="button" value="Voltar" class="botao2" onclick="gerenciarFuncionario();">
            </td>
            <td class="input2">
              <input type="submit" value="Enviar" class="botao2" onclick="<?php echo($router)?>">
            </td>
        </tr>
    </table>

</form>
