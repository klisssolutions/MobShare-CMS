
<div class="titulo-func-lista">GERENCIAMENTO DE E-MAIL MARKETING</div>

<form id="form" method="post" action="envio.php">

  <table class="func-cad">
          <tr>
              <td class="titulo-func-cad">
              
              Destinatarios:

              </td>
              <td class="txt-func">
                <input type="text" size="26" class="input-func" name="txtDestinatario">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
              
              Assunto:

              </td>
              <td class="txt-func">
                <input type="text" size="26" class="input-func" name="txtAssunto">
              </td>
          </tr>
          <tr>
              <td class="titulo-func-cad">
              Mensagem:
              </td>
              <td class="txt-func">
                <textarea class="mensagem" name="txtMensagem"></textarea>
              </td>
          </tr>
          
          <tr>
              <td class="resp-termo">
                <select class="slt-func" name="sltAtivo">
                    <option value="1">Enviar para 1</option>
                    <option value="0">Enviar para todos</option>
                </select>
              </td>
              <td class="txt-func">
                <input type="submit" value="Enviar" class="botao2">
              </td>
          </tr>
      </table>
     
</form>
