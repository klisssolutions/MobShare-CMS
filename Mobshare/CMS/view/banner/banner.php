<?php
  @session_start();
  require_once($_SESSION["importInclude"]); 
  define("MARCADO", "checked");

  $titulo = "";
  $texto = "";
  $url = "";
  $nomeBotao = "";
  $foto = "";


  //Função do onclick para saber qual ação chama o router
  $router = "router('banner', 'inserir', 0)";

  if(isset($banner)){
    
    $router = "router('banner', 'ATUALIZAR', ".$banner->getIdBanner().")";

    $titulo = $banner->getTitulo();
    $texto = $banner->getTexto();
    $url = $banner->getHref();
    $nomeBotao = $banner->getNomeBotao();
    $foto = "../arquivos/" . $banner->getImagem();
  }
?>
<div class="titulo-func-lista">GERENCIAMENTO DE BANNERS</div>

<form id="form" method="POST" enctype="multipart/form-data">

        <div class="linha">
            <div class="texto-niveis">
              Titulo:
            </div>
          <div class="texto-niveis">
            <input type="text" class="input-func" name="txttitulo" size="20" maxlength="15" value="<?php echo($titulo) ?>" required>
          </div>
        </div>
        <div class="linha">
          <div class="texto-niveis">
            Texto:
          </div>
          <div class="input2">
            <input type="text" class="input-func" name="txttexto" size="20" maxlength="30" value="<?php echo( $texto ) ?>" required>
          </div>
        </div>

        <div class="linha">
          <div class="texto-niveis">
            Url redirecionamento:
          </div>
          <div class="input2">
            <input type="text" class="input-func" name="txturl" size="20" maxlength="30" value="<?php echo($url) ?>" required>
          </div>
        </div>        
 
        <div class="linha">
          <div class="texto-niveis">
            Nome botão:
          </div>
          <div class="input2">
            <input type="text" class="input-func" name="txtnomebotao" size="20" maxlength="30" value="<?php echo($nomeBotao) ?>" required>
          </div>
        </div> 


        <div class="linha">
          <div class="texto-niveis">
            Imagem:
          </div>
          <div class="input2">
             <input type="file" name="imgBanner" id="imgBanner" accept="image/*" onchange="preview(this)" value="<?php echo($foto)?>">
          </div>
        </div>

        <div class="linha-imagem" align="center">
          <img src="<?php echo($foto); ?>" id="prev">
        </div>

        <div class="linha">
            <div class="texto-niveis-check">
            <input type="button" value="Voltar" class="btn-fun" onclick="banner();">
            </div>
            <div class="texto-niveis-check">
              <input type="submit" value="Salvar" class="btn-fun" onclick="<?php echo($router);?>">
            </div>
        </div>
    </div>

</form>