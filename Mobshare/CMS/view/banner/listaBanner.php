<?php
    @session_start();
    require_once($_SESSION["importInclude"]); 
    
    require_once(IMPORT_BANNER_CONTROLLER);
    require_once(IMPORT_BANNER);

    $controllerBanner = new controllerBanner();

    $banners[] = new Banner();

    $banners = $controllerBanner->listarBanners();
?>

<div class="titulo-func-lista">GERENCIAMENTO DE BANNERS</div>

<div class="botoes-func">

    <input type="button" value="Novo" class="btn-fun" onclick="cadastroBanner();">
    <input type="button" value="Voltar" class="btn-fun" onclick="admPaginas();">

</div>
<?php

    foreach($banners as $banner){
?>
<div class="listaDadosFunc">

    <div class="dados-func">
    
        ID Banner:
        
    </div>
    <div class="dados-resp-func">
    
        <?php echo($banner->getIdBanner());?>
    
    </div>
    <div class="dados-func">
    
        Titulo:
        
    </div>
    <div class="dados-resp-func">
        <?php echo($banner->getTitulo());?>
    </div>
    
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('banner', 'buscar', <?php echo($banner->getIdBanner());?>)">
        <img src="view/imagens/pencil.png" width="25" heigth="28"></a>
    
    </div>
    <div class="opcao">
    
        <a href="#" onclick="selectRouter('banner', 'excluir', <?php echo($banner->getIdBanner());?>)">
        <img src="view/imagens/trash.png" width="25" heigth="28">
        </a>

    </div>
</div>
<?php
    }
?>