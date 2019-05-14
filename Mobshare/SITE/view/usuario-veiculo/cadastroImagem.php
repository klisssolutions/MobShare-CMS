<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 



    $id = $_GET['idVeiculo'];
    $_SESSION['idVeiculo'] = $id;
    

    require_once(IMPORT_CATEGORIA);
    require_once(IMPORT_CATEGORIA_CONTROLLER);

    $controllerCategoria = new controllerCategoria;
    $categoria = new Categoria();
    $categoria = $controllerCategoria->buscarCategorias();

    $_GET['id'] = $categoria->getIdTipo_Veiculo();


    require_once(IMPORT_TIPO);
    require_once(IMPORT_TIPO_CONTROLLER);

    $controllerTipo = new controllerTipo;
    $tipo = new Tipo();
    $tipo = $controllerTipo->buscarTipo();
  
    $fotos = $tipo->getFotos();

    $router = "router('foto_veiculo', 'inserir', '0')";

?>

    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/link.js"></script>
    <title>Painel do Usuário </title>


                <div class="titulo-lista">MANDE FOTOS DE SEU VEICULO</div>
                
                <form id="form" method="post" enctype="multipart/form-data">

                    <table class="dash-cad">
                    <?php for($i=0; $i < $fotos; $i++):?>
                        <tr>
                            <td class="titulo-dash-cad" rowspan="1">
                            

                                <input type="file" name="foto[]" required>

                            </td>
                        </tr>

                        <?php endfor ?>


                      
                        <tr>
                            <td class="titulo-dash-cad">
                                <input type="button" value="Voltar" class="btn-dash" onclick="veiculo();">
                            </td>
                            <td class="titulo-dash-cad">
                                <input type="submit" value="Enviar" class="btn-dash" onclick="<?php echo($router); ?>">
                            </td>
                        </tr>
                    </table>
                </form>
            