<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
    require_once(IMPORT_DUVIDAS_FREQUENTES);
    require_once(IMPORT_DUVIDAS_FREQUENTES_CONTROLLER);

  
    
    
    $perguntas ='';
    $resposta='';
    $ativo='';
    $chkAtivar = '';
    $chkDesativar = '';
    $router = "router('duvidas', 'inserir', '0')";  

    

    if(isset($duvidasFrequentes)){
        
        $perguntas = $duvidasFrequentes->getPerguntas();
        $resposta = $duvidasFrequentes->getResposta();
        $ativo = $duvidasFrequentes->getAtivo();
        $router = "router('duvidas','atualizar','".$duvidasFrequentes->getIdPergunta()."')";
        if($ativo){
            $chkAtivar = "checked";
        }else{
            $chkDesativar = "checked";
        }
    }


?>

<div class="titulo-func-lista">DUVIDAS FREQUENTES</div>

<form id="form" method="POST">
 
<table class="func-cad">
  
    <tr>
            <td class="titulo-func-cad">
                Pergunta:
            </td>
            <td class="txt-func">
              <input type="text" class="input-func" size="20" name="txtPerguntas" value="<?php echo($perguntas);?>">
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Resposta:
            </td>
            <td class="txt-func">
              <input type="text" class="input-func" size="20" name="txtResposta" value="<?php echo($resposta);?>">
            </td>
        </tr>
        <tr>
          <td class="titulo-func-cad">
              Situação:
          </td>
          <td class="txt-func">
            <input type="radio" value="1" name="ativo" <?php echo($chkAtivar);?>>Ativar<br>
            <input type="radio" value="0" name="ativo" <?php echo($chkDesativar);?>>Desativar
          </td>
      </tr>
    
        <tr>
            <td class="titulo-func-cad">
            <input type="button" value="Voltar" class="btn-fun" onclick="duvida();">
            </td>
    
            <td class="titulo-func-cad">
                 <input type="submit" value="Enviar" class="btn-fun" onclick="<?php echo($router)?>">
            </td>
        </tr>
</table>
    
</form>