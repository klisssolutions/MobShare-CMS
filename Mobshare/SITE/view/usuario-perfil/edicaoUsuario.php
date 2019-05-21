<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

$id = $_GET['id'];

require_once(IMPORT_CLIENTE);
require_once(IMPORT_CLIENTE_CONTROLLER);

$controllerCliente = new controllerCliente();
$clientes[] = new Cliente();
$clientes = $controllerCliente->buscarCliente();


if($id){

    $nome = $clientes->getNome();
    $cpf = $clientes->getCpf();
    $dtNasc = $clientes->getDtNasc();
    $cnh = $clientes->getCnh();
    $categoria = $clientes->getCategoriaCnh();
    $categoriaA = null;
    $categoriaB = null;
    $categoriaAB = null;
    $email = $clientes->getEmail();
    $senha = $clientes->getSenha();
    $foto = "../../../arquivos/" . $clientes->getFotoPerfil();

    if($categoria == "A"){
        $categoriaA = "selected";
    }elseif($categoria == "B"){
        $categoriaB = "selected";
    }else{
        $categoriaAB = "selected";
    }

    $router = "rota('CLIENTES', 'ATUALIZAR', '".$clientes->getIdCliente()."')";

  }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta http-equiv="Content-Type" content="view/text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/user.png" />
    <script type="text/javascript" src="../js/link.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
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
                        <img src="../../../arquivos/<?php echo ($clientes->getFotoPerfil());?>" width="180" height="180"  alt="Usuário">
                    </div>
                    <div class="nome-usuario-menu">
                        <h1><?php echo ($clientes->getNome());?></h1>
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
                <form id="form" method="post" enctype="multipart/form-data">
                    <div class="info-perfil">
                        <div class="titulo-perfil">
                            Meus dados do perfil
                        </div>
                        <div class="foto-perfil">
                            <img src="<?php echo($foto)?>" width="310" height="310" id="prev" alt="Usuário">
                        </div>
                    </div>
                    <div class="info-perfil">
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Nome completo:</h1>
                                <input type="text" class="input-usuario" name="txtnome" value="<?php echo($nome)?>">
                            </div>
                            <div class="dados">
                                <h1>Foto de Perfil:</h1>
                                <input type="file" class="input-usuario" name="imgPerfil" value="<?php echo($foto)?>" onchange="preview(this)">
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Data de Nascimento:</h1>
                                <input type="date" class="input-usuario" name="txtdtnasc" value="<?php echo($dtNasc)?>">
                            </div>
                            <div class="dados">
                                <h1>CPF:</h1>
                                <input type="text"class="input-usuario" name="txtcpf" value="<?php echo($cpf)?>">
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Email:</h1>
                                <input type="email" class="input-usuario" name="txtemail" value="<?php echo($email)?>">
                            </div>
                            <div class="dados">
                                <h1>Senha:</h1>
                                <input type="password" class="input-usuario" name="txtsenha" value="<?php echo($senha)?>">
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Numero da CNH:</h1>
                                <input type="text" class="input-usuario" name="txtcnh" value="<?php echo($cnh)?>">
                            </div>

                            <div class="dados">
                                <h1>Tipo de CNH:</h1>
                                <select class="input-usuario" name="cbcategoriacnh" required>

                                    

                                    <option value="">Selecione uma categoria</option>
                                    
                                    <option value="Tipo A" <?php echo($categoriaA); ?>>Tipo A</option>
                                    
                                    <option value="Tipo B" <?php echo($categoriaB); ?>>Tipo B</option>
                                    
                                    <option value="Tipo B" <?php echo($categoriaAB); ?>>Tipo AB</option>
                                </select>
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <input class="btn-usuario-canc" type="button" name="btnCancelar" value="Cancelar" onclick="">
                            </div>
                            <div class="dados">
                                 <input class="btn-usuario" type="submit" name="btnSalvar" value="Salvar" onclick="<?php echo($router); ?>">
                            </div>
                        </div>
                    </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>