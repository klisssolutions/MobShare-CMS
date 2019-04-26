<?php
@session_start();
require_once($_SESSION["importInclude"]); 

//$router = "router('FALE_CONOSCO','inserir','0')";
$router = PASTA_PROJETO."/SITE/router.php?controller=FALE_CONOSCO&modo=inserir&id=0";

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />

<!--    <script type="text/javascript" src="../../js/ajax.js"></script>-->
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <title>Home | Mob'Share</title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <section class="content">
        <div class="box-fale-conosco">
        <div class="fale-conosco">
            <!-- FORMULÁRIO DO FALE CONOSCO -->
            <form id="form" method="post" action="<?php echo($router)?>">
                <div class="titulo-fale-conosco">
                    <h1>Fale Conosco:</h1>
                </div>
                <div class="nome-fale-conosco">
                    <h1>Nome:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtNome"/>
                </div>
                <div class="email-fale-conosco">
                    <h1>E-mail:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtEmail"/>
                </div>
                <div class="assunto-fale-conosco">
                     <h1>Assunto:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtAssunto"/>
                </div>
                <div class="mensagem-fale-conosco">
                        <h1>Mensagem:</h1>
                        <textarea  class="msg-fale-conosco" name="txtMensagem"></textarea>
                </div>
                <div class="botao-fale-conosco">
                    <input type="submit" class="btn-fale-conosco" value="Enviar">
                </div>
            </form>
        </div>

        </div>

    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>
    
    </body>
    
    </html>