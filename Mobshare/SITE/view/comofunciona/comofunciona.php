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
        <div class="box-como-funciona-primeiro">
            <div class="texto-como-funciona-pag">
                <p>Para usar o site, é só fazer o login e se não tiver cadastro faça ele que é simples.
                    Depois disso veja o carro disponivel mais perto de você e converse diretamento com quem está
                    alugando o carro. Não esqueça que você também pode colocar um carro pra alugar!
                </p>
                <h1>Venha usar nosso site!</h1>
            </div>
            <div class="image-como-funciona-pag">
                    <img src="../images/carrodinheiro.png" width="700" height="450"  alt="App da MobShare">
            </div>
        </div>
        <div class="box-como-funciona-segundo">
            <div class="image-como-funciona2">
                    <img src="../images/carrogente.png" width="700" height="400"  alt="App da MobShare">
            </div>
            <div class="texto-como-funciona2">
                    <h1>Venha usar nosso site!</h1>
                    <p>Para usar o site, é só fazer o login e se não tiver cadastro faça ele que é simples.
                        Depois disso veja o carro disponivel mais perto de você e converse diretamento com quem está
                        alugando o carro. Não esqueça que você também pode colocar um carro pra alugar!
                    </p>
                   
            </div>
        </div>
        
        <div class="box-como-funciona-quarto">
            
            <div class="texto-como-funciona4">
                    <h1>Venha usar nosso site!</h1>
                    <p>Para usar o site, é só fazer o login e se não tiver cadastro faça ele que é simples.
                            Depois disso veja o carro disponivel mais perto de você e converse diretamento com quem está
                            alugando o carro. Não esqueça que você também pode colocar um carro pra alugar!
                    </p>
                
                    
            </div>
            <div class="image-como-funciona4">
                <img src="../images/carrochat.png" width="700" height="400"  alt="App da MobShare">

        </div>
        
        </div>
        <div class="box-como-funciona-terceiro">
            <div class="avaliacoes">
                    <h1>★★★★☆</h1>
                    <p>Para usar o site, é só fazer o login e se não tiver cadastro faça ele que é simples.
                            Depois disso veja o carro disponivel mais perto de você e converse diretamento com quem está
                            alugando o carro. Não esqueça que você também pode colocar um carro pra alugar!
                </p>
                <h2>- Alex Gonçalvez</h2>
            </div>
        </div>

    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>
    
    </body>
    
    </html>