<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 



    
    $router = "router('foto_veiculo', 'inserir', '0')";

?>

    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/link.js"></script>
    <title>Painel do Usuário </title>


                <div class="titulo-lista"><?php echo($id); ?></div>
                
                <form id="form" method="post" enctype="multipart/form-data">
                    <table class="dash-cad">
                        <tr>
                            <td class="titulo-dash-cad">
                                Item 1:<input type="checkbox" name="acessorio[]" required>
                            </td>
                            <td class="titulo-dash-cad">

                                Item<input type="checkbox" name="acessorio[]" required>

                            </td>
                        </tr>
                        <tr>
                            <td class="titulo-dash-cad">
                                Item 2:<input type="checkbox" name="acessorio[]" required>
                            </td>
                            <td class="titulo-dash-cad">

                                2<input type="checkbox" name="acessorio[]" required>

                            </td>
                        </tr>
                        <tr>
                            <td class="titulo-dash-cad">
                                <input type="button" value="Voltar" class="btn-dash" onclick="veiculo();">
                            </td>
                            <td class="titulo-dash-cad">
                                <input type="submit" value="Enviar" class="btn-dash" onclick="<?php echo($router); ?>">
                            </td>
                        </tr>
                    </table>

                    <table class="dash-cad">
                    <?php for($i=0; $i < $fotos; $i++):?>
                        <tr>
                            <td class="titulo-dash-cad">
                                Foto da Dianteira:
                            </td>
                            <td class="txt-dash">

                                <input type="checkbox" name="acessorio[]" required>

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
            