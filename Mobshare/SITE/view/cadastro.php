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
    <link rel="shortcut icon" href="images/anuncios.png" />
    <title>Cadastro | Mob'Share</title>
</head>
<body>
    <div class="content-cadastro">
        <div class="cadastro">
        <form class="s" method="POST" action="">
            <div class="img-cadastro">
                <img src="images/pessoa.jpg" width="150" height="150"  alt="Foto de perfil">
            </div>
        </form>
        <form class="s" method="POST" action="">
            <div class="txt-cadastro">
                <h1>Nome:<h1>
                <input type="text" name="txtnome" class="ipt-cad" value="" placeholder="Digite seu nome completo">
            </div>
            <div class="txt-cadastro">
                <h1>E-mail:<h1>
                <input type="email" name="txtnome" class="ipt-cad" value="" placeholder="Digite seu e-mail">
            </div>
            <div class="txt-cadastro">
                <h1>Senha:<h1>
                <input type="password" name="txtnome" class="ipt-cad" value="" placeholder="Digite uma senha">
            </div>
            <div class="txt-cadastro">
                <h1>Sexo:<h1>
                <input type="checkbox" name="termosdeuso" value="termosdeuso">Feminino
                <input type="checkbox" name="termosdeuso" value="termosdeuso"> Masculino
            </div>
            <div class="txt-div-cadastro">
                <h1>CPF:<h1>
                <input type="number" name="txtnome" class="ipt-cads" value="" placeholder="Digite seu CPF">
            </div>
            <div class="txt-div-cadastro">
                <h1>Data de Nascimento:<h1>
                <input type="date" name="txtnome" class="ipt-cads" value="" placeholder="Digite seu nome completo">
            </div>
            <div class="txt-div-cadastro">
                <h1>Numero da CNH:<h1>
                <input type="number" name="txtnome" class="ipt-cads" value="" placeholder="Digite seu nome completo">
            </div>
            <div class="txt-div-cadastro">
                <h1>Tipo da CNH:<h1>
                <select class="ipt-cads" >
                    <option value="volvo">Tipo A</option>
                    <option value="saab">Tipo B</option>
                </select>
            </div>
            <div class="aceite-termo">
                <input type="checkbox" name="termosdeuso" value="termosdeuso">declaro que aceito os termos(link para os termos)
            </div>
            <div class="aceite-termo">
                <input type="submit" class="btn-cad" value="Cadastrar"/>
                <p>Não tem login? Cadastre-se!</p>
            </div>
            
        </form>
        </div>
        <div class="rodape-login">
        </div>
    </div>
</body>
</html>