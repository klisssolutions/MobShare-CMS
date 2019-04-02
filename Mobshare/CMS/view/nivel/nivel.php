<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
  define("MARCADO", "checked");

  $idNivel = null;
  $nome = null;
  $descricao = null;
  $permissoes = null;
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
    $permissoes = $nivel->getPermissoes();
    $router = "router('niveis', 'atualizar', ".$idNivel.")";
    
    //Verifica se tem as permissões para marcar as caixas de permissoes
    $chkFuncionario = (acessoModulo($permissoes, MODULO_FUNCIONARIO) ? MARCADO : null);
    $chkMarketing = (acessoModulo($permissoes, MODULO_MARKETING) ? MARCADO : null);
    $chkLocacao = (acessoModulo($permissoes, MODULO_LOCACAO) ? MARCADO : null);
    $chkPagina = (acessoModulo($permissoes, MODULO_PAGINA) ? MARCADO : null);
    $chkAprovacao = (acessoModulo($permissoes, MODULO_APROVACAO) ? MARCADO : null);
    $chkContato = (acessoModulo($permissoes, MODULO_CONTATO) ? MARCADO : null);
    $chkRelatorio = (acessoModulo($permissoes, MODULO_RELATORIO) ? MARCADO : null);
  }
?>
<div class="titulo-func-lista">GERENCIAMENTO DE NIVEIS</div>

<form id="form" method="POST">

        <div class="linha">
            <div class="texto-niveis">
              Nome:
            </div>
          <div class="texto-niveis">
            <input type="text" class="input-func" name="txtnome" size="20" maxlength="15" value="<?php echo($nome); ?>" required>
          </div>
        </div>
        <div class="linha">
          <div class="texto-niveis">
            Descrição:
          </div>
          <div class="input2">
            <input type="text" class="input-func" name="txtdescricao" size="20" maxlength="30" value="<?php echo($descricao); ?>" required>
          </div>
        </div>
        <div class="linha">
            <div class="texto-niveis" colspan="2">
            Permissões:
          </div>
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkfuncionario" value="1" <?php echo($chkFuncionario); ?>>Funcionários<br>
            </div>
          </div>
        <div class="linha">
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkmarketing" value="1"<?php echo($chkMarketing); ?>>E-mail Marketing<br>
            </div>
            <div class="texto-niveis-check">
              <input type="checkbox" name="chklocacao" value="1"<?php echo($chkLocacao); ?>>Lista de locações<br>
            </div>
        </div>
        <div class="linha">
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkpagina" value="1"<?php echo($chkPagina); ?>>Conteúdo<br>
            </div>
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkaprovacao" value="1"<?php echo($chkAprovacao); ?>>Aprovar Cadastros<br>
            </div>
        </div>
        <div class="linha">
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkcontato" value="1"<?php echo($chkContato); ?>>Fale Conosco<br>
            </div>
            <div class="texto-niveis-check">
              <input type="checkbox" name="chkrelatorio" value="1"<?php echo($chkRelatorio); ?>>Relatórios<br>
            </div>
        </div>
        <div class="linha">
            <div class="texto-niveis-check">
            <input type="button" value="Voltar" class="btn-fun" onclick="gerenciarFuncionario();">
            </div>
            <div class="texto-niveis-check">
              <input type="submit" value="Salvar" class="btn-fun" onclick="<?php echo($router);?>">
            </div>
        </div>
    </div>

</form>