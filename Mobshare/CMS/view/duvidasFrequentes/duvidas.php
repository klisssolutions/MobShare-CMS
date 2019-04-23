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

<div class="titulo">DUVIDAS FREQUENTES</div>

<form id="form" method="POST">
 
<table>
  
    <tr>
            <td class="label2">
                Pergunta:
            </td>
            <td class="input2">
              <input type="text" size="20" name="txtPerguntas" value="<?php echo($perguntas);?>">
            </td>
        </tr>
        <tr>
            <td class="label2">
                Resposta:
            </td>
            <td class="input2">
              <input type="text" size="20" name="txtResposta" value="<?php echo($resposta);?>">
            </td>
        </tr>
        <tr>
          <td class="label2">
              Situação:
          </td>
          <td class="input2">
            <input type="radio" value="1" name="ativo" <?php echo($chkAtivar);?>>Ativar<br>
            <input type="radio" value="0" name="ativo" <?php echo($chkDesativar);?>>Desativar
          </td>
      </tr>
    
    
    
        <tr>
            <td class="label2">
            <input type="submit" value="Voltar" class="botao2" onclick="admPaginas();">
            </td>
    
            <td class="input2">
                 <input type="submit" value="Enviar" class="botao2" onclick="<?php echo($router)?>">
               
                
                    
            </td>
        </tr>
</table>
    
</form>