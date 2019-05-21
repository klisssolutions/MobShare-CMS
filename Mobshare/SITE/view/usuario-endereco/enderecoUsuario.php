<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

    require_once(IMPORT_ENDERECO);
    require_once(IMPORT_ENDERECO_CONTROLLER);

    $controllerEndereco = new controllerEndereco();
    $enderecos[] = new Endereco();
    $enderecos = $controllerEndereco->listarEnderecos();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta http-equiv="Content-Type" content="view/text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/user.png" />
    <script type="text/javascript" src="../js/link.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <title>Painel do Usuário </title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content" id="informacao">
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
                <div class="nav-menu-usuario">
                    
                    <h2> <img src="../images/black-male-user-symbol.png" width="28" height="28"  alt="Usuário">Meu perfil</h2>
                </div>
                <div class="nav-menu-usuario-clicado">
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
                <div class="conteudo-endereco">
                <div class="titulo-lista">GERENCIAR ENDEREÇOS</div>
                <div class="botoes-dash">

    <input type="button" value="Novo" class="btn-dash" onclick="endereco()">
    <input type="button" value="Voltar" class="btn-dash" onclick="paginaInicial();">

</div>

<?php
    foreach($enderecos as $endereco){
?>

<div class="listaDadosDash">

    <div class="dados-dash">
    
        Rua:
        
    </div>
    <div class="dados-resp-dash">
    
        <?php echo($endereco->getRua());?>
    
    </div>
    <div class="dados-dash">
    
        Cidade:
        
    </div>
    <div class="dados-resp-dash">
    
    <?php echo($endereco->getCidade());?>
    
    </div>
    <div class="dados-dash">
    
        Estado:
        
    </div>
    <div class="dados-resp-dash">
    
    <?php echo($endereco->getUf());?>
    
    </div>
    <div class="dados-dash">
    
        Numero:
        
    </div>
    <div class="dados-resp-dash">
    
    <?php echo($endereco->getNumero());?>
    
    </div>
    <div class="dados-dash">
    
        Complemento:
        
    </div>
    <div class="dados-resp-dash">
    
    <?php echo($endereco->getComplemento());?>
    
    </div>
    <div class="opcao">
        
        <a href="#" onclick="selectRouter('endereco', 'buscar', <?php echo($endereco->getIdEndereco());?>)">
            <img src="view/imagens/pencil.png" width="25" heigth="28">
        </a>
    
        <a href="#" onclick="selectRouter('endereco', 'excluir', <?php echo($endereco->getIdEndereco());?>)">
            <img src="view/imagens/trash.png" width="25" heigth="28">
        </a>

    
    </div>
    
</div>
    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>