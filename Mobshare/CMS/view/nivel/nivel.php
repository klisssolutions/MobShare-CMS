<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
  define("MARCADO", "checked");

  $idNivel = null;
  $nome = null;
  $descricao = null;
  $permissao = null;
  $chkFuncionario = null;
  $chkMarketing = null;
  $chkLocacao = null;
  $chkPagina = null;
  $chkAprovacao = null;
  $chkContato = null;
  $chkRelatorio = null;


  //Função do onclick para saber qual ação chama o router
  $router = "router('niveis', 'inserir', 0)";

  if(isset($nivel)){
    $idNivel = $nivel->getIdNivel();
    $nome = $nivel->getNome();
    $descricao = $nivel->getDescricao();
    $permissao = $nivel->getPermissao();
    $router = "router('niveis', 'atualizar', ".$idNivel.")";
    
    //Verifica se tem as permissões para marcar as caixas de permissoes
    $chkFuncionario = (acessoModulo($permissao, MODULO_FUNCIONARIO) ? MARCADO : null);
    $chkMarketing = (acessoModulo($permissao, MODULO_MARKETING) ? MARCADO : null);
    $chkLocacao = (acessoModulo($permissao, MODULO_LOCACAO) ? MARCADO : null);
    $chkPagina = (acessoModulo($permissao, MODULO_PAGINA) ? MARCADO : null);
    $chkAprovacao = (acessoModulo($permissao, MODULO_APROVACAO) ? MARCADO : null);
    $chkContato = (acessoModulo($permissao, MODULO_CONTATO) ? MARCADO : null);
    $chkRelatorio = (acessoModulo($permissao, MODULO_RELATORIO) ? MARCADO : null);
  }
?>
<div class="titulo">GERENCIAMENTO DE NIVEIS</div>

<form id="form" method="POST">

        <div class="linha">
            <div class="label2">
              Nome:
            </div>
          <div class="input2">
            <input type="text" name="txtnome" size="20" maxlength="15" value="<?php echo($nome); ?>" required>
          </div>
        </div>
        <div class="linha">
          <div class="label2">
            Descricao:
          </div>
          <div class="input2">
            <input type="text" name="txtdescricao" size="20" maxlength="30" value="<?php echo($descricao); ?>" required>
          </div>
        </div>
        <div class="linha">
            <div class="label2" colspan="2">
            Permissões:
          </div>
            <div class="input2">
              <input type="checkbox" name="chkfuncionario" value="1" <?php echo($chkFuncionario); ?>>Funcionários<br>
            </div>
          </div>
        <div class="linha">
            <div class="label2">
              <input type="checkbox" name="chkmarketing" value="1"<?php echo($chkMarketing); ?>>E-mail Marketing<br>
            </div>
            <div class="input2">
              <input type="checkbox" name="chklocacao" value="1"<?php echo($chkLocacao); ?>>Lista de locações<br>
            </div>
        </div>
        <div class="linha">
            <div class="label2">
              <input type="checkbox" name="chkpagina" value="1"<?php echo($chkPagina); ?>>Conteúdo<br>
            </div>
            <div class="input2">
              <input type="checkbox" name="chkaprovacao" value="1"<?php echo($chkAprovacao); ?>>Aprovar Cadastros<br>
            </div>
        </div>
        <div class="linha">
            <div class="label2">
              <input type="checkbox" name="chkcontato" value="1"<?php echo($chkContato); ?>>Fale Conosco<br>
            </div>
            <div class="input2">
              <input type="checkbox" name="chkrelatorio" value="1"<?php echo($chkRelatorio); ?>>Relatórios<br>
            </div>
        </div>
        <div class="linha">
            <div class="label2">
            <input type="button" value="Voltar" class="botao2" onclick="gerenciarFuncionario();">
            </div>
            <div class="input2">
              <input type="submit" value="Enviar" class="botao2" onclick="<?php echo($router);?>">
            </div>
        </div>
    </div>

</form>