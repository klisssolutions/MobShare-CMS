<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

require_once(IMPORT_TERMOS);
require_once(IMPORT_TERMOS_CONTROLLER);


$controllerTermos = new controllerTermos();
$termos[] = new Termos();
$termos = $controllerTermos->listarTermos();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />
    <title>Home | Mob'Share</title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <section class="content">
        <div class="box-termos">
            <div class="image-termos">
                <div class="texto-sob-imagem">
                    <h1>Termos de Uso</h1>
                </div>
            </div>
            <div class="texto-termos">
            <?php
                foreach($termos as $termo){
                    if($termo->getAtivo()== 1){
            ?>
                <div class="termo">
                    <p> 
                    <?php echo($termo->getTexto());?> 
                    </p>
                </div>
            <?php }} ?> 
            </div>
        </div>

    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>
    
    </body>
    
    </html>
</html>