<?php

    @session_start();
    $_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

    //Require das constantes
    require_once($_SESSION["importInclude"]);

    if(isset($_GET['destroy'])){
        unset($_SESSION['idCliente']);
        header("location: " . LINK_SITE_HOME);
    }else{
        if(isset($_SESSION['idCliente'])){
            if($_SESSION['idCliente'] != null){
                header("location: " . LINK_SITE_HOME);
            }else{
                header("location: " . LINK_SITE_LOGIN);
            }
        }else{
            if(isset($idCliente)){
                if($idCliente != null){
                    $_SESSION['idCliente'] = $idCliente;
                    header("location: " . LINK_SITE_HOME);
                }else{
                    header("location: " . LINK_SITE_LOGIN);
                }
            }else{
                header("location: " . LINK_SITE_LOGIN);
            }
        }
    }
?>