<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="view/images/anuncios.png" />
    <title>Parceiros | Mob'Share</title>
</head>
<body>
    <div class="content-login">
        <form class="login" method="POST" action="router.php?controller=clientes&modo=logar">
            <div class="img-login">
               <a href="<?php echo(LINK_SITE_INDEX); ?>"><img src="images/logo.png" width="364" height="150"  alt="MobShare"></a>
            </div>
            <div class="txt-login">
                <h1>Login:</h1>
                <input type="text" name="txtemail" class="input-login">
            </div>
            <div class="txt-login">
                <h1>Senha:</h1>
                <input type="text" name="txtsenha" class="input-login">
            </div>
            <div class="btn-login">
                <button class="btn-login-form">Entrar</button>
                <p>Não tem login? Cadastre-se!</p>
            </div>
        </form>
        <div class="rodape-login">
        </div>
    </div>
</body>
</html>