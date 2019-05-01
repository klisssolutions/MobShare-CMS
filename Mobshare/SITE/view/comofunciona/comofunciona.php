<?php 

    @session_start();
    @$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
    require_once($_SESSION["importInclude"]); 
    require_once(IMPORT_FUNCIONAMENTO);
    require_once(IMPORT_FUNCIONAMENTO_CONTROLLER);

    $controllerFuncionamento = new controllerFuncionamento();

    $funcionamentos[] = new Funcionamento();
    $funcionamentos = $controllerFuncionamento->listarFuncionamento();

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
        <?php
            $cont = 0;
                foreach($funcionamentos as $funcionamento){
                    if($funcionamento->getAtivo()){
                        if($cont%2){
        ?>
        
        <div class="box-como-funciona-segundo">
            <div class="image-como-funciona2">
                    <img src="<?php echo("/Mobshare/arquivos/".$funcionamento->getFoto());?>" width="700" height="400"  alt="App da MobShare">
            </div>
            <div class="texto-como-funciona2">
                    <h1><?php echo($funcionamento->getTitulo());?></h1>
                    <p><?php echo($funcionamento->getDescricao());?></p>
                   
            </div>
        </div>
                        <?php $cont++; }else{?>
        <div class="box-como-funciona-quarto">
            
            <div class="texto-como-funciona4">
                    <h1><?php echo($funcionamento->getTitulo());?></h1>
                    <p><?php echo($funcionamento->getDescricao());?></p>
                
                    
            </div>
            <div class="image-como-funciona4">
                <img src="<?php echo("/Mobshare/arquivos/".$funcionamento->getFoto());?>" width="700" height="400"  alt="App da MobShare">

        </div>
</div>
                    <?php 
                $cont++;    
                }
                    }
                }?>
        
        
        
        
        
    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>
    </body>
    
    </html>