<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]);
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
       <div class="box-parceiros">
            <div class="box-parceiro1">
                <div class="box-texto-imagem">
                    <div class="txt-parceiro">
                        <h1>Parceiros</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat. Aliquam egestas</p>
                    </div>
                </div>
                <div class="box-texto-imagem">
                    <div class="img-parceiro">
                        <img src="../images/carrochat.png" width="471" height="277"  alt="App da MobShare">
                    </div>
                </div>
            </div>
            <div class="box-parceiro">
                <div class="slider-parceiros">
                    <img src="../images/pc.png" width="700" height="415"  alt="App da MobShare">
                </div>
                <div class="txt-slider-parceiros">
                    <h1>Nossos Parceiros</h1>
                </div>
            </div>
            <div class="box-parceiro">
                <div class="box-texto-imagem">
                    <div class="img-parceiro">
                        <img src="../images/carrochat.png" width="471" height="277"  alt="App da MobShare">
                    </div>
                </div>
                <div class="box-texto-imagem">
                    <div class="txt-parceiro">
                        <h1>Parceiros</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat. Aliquam egestas</p>
                    </div>
                </div>
            </div>
       </div>
    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>
    
    </body>
    
    </html>