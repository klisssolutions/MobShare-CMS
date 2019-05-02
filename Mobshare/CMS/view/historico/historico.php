<?php 

  @session_start();
  require_once($_SESSION["importInclude"]); 

  require_once(IMPORT_V_DETALHES_LOCACAO);
  require_once(IMPORT_V_DETALHES_LOCACAO_CONTROLLER);

  $controllerV_detalhes_locacao = new controllerV_detalhes_locacao();
  $locacoes[] = new V_detalhes_locacao();
  $locacoes = $controllerV_detalhes_locacao->listarLocacoes();
?>

<div class="titulo-func-lista">GERENCIAMENTO DO HISTORICO DE LOCAÇÃO</div>

<table class="func-cad">
        <tr>
            <td class="titulo-func-cad">
                Locador:
            </td>
            <td class="titulo-func-cad">
              pessoa1
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Locatario:
            </td>
            <td class="titulo-func-cad">
              pessoa2
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Data:
            </td>
            <td class="titulo-func-cad">
              15/03/2019
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Inicio:
            </td>
            <td class="titulo-func-cad">
              13:30
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Fim:
            </td>
            <td class="titulo-func-cad">
              17:30
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
                Veiculo:
            </td>
            <td class="titulo-func-cad">
              Audi R8
            </td>
        </tr>

        <tr>
            <td class="titulo-func-cad">
                Valor:
            </td>
            <td class="titulo-func-cad">
              R$50,50
            </td>
        </tr>
        <tr>
            <td class="titulo-func-cad">
               <input type="button" value="Voltar" class="btn-fun" onclick="historicoLocacao();">
            </td>
            <td class="titulo-func-cad">
              
            </td>
        </tr>
    </table>