<?php

    @session_start();
    $_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

    //Require das constantes
    require_once($_SESSION["importInclude"]);

    // if(isset($_GET['destroy'])){
    //     unset($_SESSION['idCliente']);
    //     header("location: index.php");
    // }else{
    //     if(isset($_SESSION['idCliente'])){
    //         if($_SESSION['idCliente'] != null){
    //             require_once(IMPORT_SITE_HOME);
    //         }else{
    //             require_once(IMPORT_SITE_LOGIN);
    //         }
    //     }else{
    //         if(isset($idCliente)){
    //             if($idCliente != null){
    //                 $_SESSION['idCliente'] = $idCliente;
    //                 require_once(IMPORT_SITE_HOME);
    //             }else{
    //                 require_once(IMPORT_SITE_LOGIN);
    //             }
    //         }else{
    //             require_once(IMPORT_SITE_LOGIN);
    //         }
    //     }
    // }
    
    header("location: view/home.php");
    //require_once(IMPORT_SITE_HOME);
?>