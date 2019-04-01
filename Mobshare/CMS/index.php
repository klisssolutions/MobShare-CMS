<?php

    @session_start();
    $_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/CMS/include.php";

    //Require das constantes
    require_once($_SESSION["importInclude"]);

    if(isset($_GET['destroy'])){
        unset($_SESSION['idFuncionario']);
        header("location: index.php");
    }else{
        if(isset($_SESSION['idFuncionario'])){
            if($_SESSION['idFuncionario'] != null){
                require_once(IMPORT_HOME);
            }else{
                require_once(IMPORT_LOGIN);
            }
        }else{
            if(isset($idFuncionario)){
                if($idFuncionario != null){
                    $_SESSION['idFuncionario'] = $idFuncionario;
                    require_once(IMPORT_HOME);
                }else{
                    require_once(IMPORT_LOGIN);
                }
            }else{
                require_once(IMPORT_LOGIN);
            }
        }
    }
?>