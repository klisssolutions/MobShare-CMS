<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta http-equiv="Content-Type" content="view/text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/user.png" />
    <title>Painel do Usuário </title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="box-painel-usuario">
            <div class="menu-lateral-usuario">
                <div class="img-usuario-menu">
                    <div class="imagem-usuario">
                        <img src="../images/jon.jpg" width="180" height="180"  alt="Usuário">
                    </div>
                    <div class="nome-usuario-menu">
                        <h1>Johnny Depp</h1>
                    </div>
                </div>
                <div class="nav-menu-usuario-clicado">
                    
                    <h2> <img src="../images/black-male-user-symbol.png" width="28" height="28"  alt="Usuário">Meu perfil</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28"  alt="Usuário">Endereços</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2><img src="../images/car (1).png" width="28" height="28"  alt="Usuário">Meus veículos</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2><img src="../images/tag.png" width="28" height="28"  alt="Usuário">Vendas</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/script.png" width="28" height="28"  alt="Usuário">Meus históricos</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28"  alt="Usuário">Cupons</h2>
                </div>
                <div class="nav-menu-usuario-button">
                    <h3>Sair</h3>
                </div>
            </div>
            <div class="conteudo-usuario">
                
                <section class="edit-usuario">
                    <div class="info-perfil">
                        <div class="titulo-perfil">
                            Meus dados do perfil
                        </div>
                        <div class="foto-perfil">
                            <img src="../images/jon.jpg" width="310" height="310"  alt="Usuário">
                        </div>
                    </div>
                    <div class="info-perfil">
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Nome completo:</h1>
                                <p>Dean Winchester</p>
                            </div>
                            <div class="dados">
                                <h1>CPF:</h1>
                                <p>052.654.786-19</p>
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Sexo:</h1>
                                <p>Masculino</p>
                            </div>
                            <div class="dados">
                                <h1>Data de Nasc:</h1>
                                <p>02/04/1383</p>
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Numero da CNH:</h1>
                                <p>256323647-46</p>
                            </div>
                            <div class="dados">
                                <h1>Tipo de CNH:</h1>
                                <p>Tipo A</p>
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <a href="edicaoUsuario.php">
                                 <input class="btn-usuario-visu" type="submit" name="btnSalvar" value="Editar">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>