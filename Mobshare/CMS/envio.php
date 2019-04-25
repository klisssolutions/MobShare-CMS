<script type="text/javascript" src="view/js/ajax.js"></script>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);


$mail = new PHPMailer(true);
try {
    //Configurando o Server
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // especificando qual servidor ele usara
    $mail->SMTPAuth = true;
    $mail->Username = 'kliss.solutions@gmail.com'; // Usuario
    $mail->Password = 'kliss123'; // Senha
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // Porta que ira acessar

    $mail->setFrom('kliss.solutions@gmail.com', 'Kliss Solutions'); // Email e nome de quem esta enviando

    if($_POST['sltAtivo'] == 1){
        $mail->addAddress($_POST['txtDestinatario']); // Email de quem recebe
    }else{
        require_once(IMPORT_CLIENTE);
        require_once(IMPORT_CLIENTE_CONTROLLER);


        $controllerCliente = new controllerCliente();

        $emails = array();

        $emails = $controllerCliente->listarEmails();

//        var_dump($emails);
        $i = 0;

        while($i<count($emails)){

            
            $mail->addAddress($emails[$i]);

            $i++;
        }

        
        
                
    }
    //Content
    $mail->isHTML(true);                                  
    $mail->Subject .= $_POST['txtAssunto']; // Assunto do Email
    $mail->Body .= $_POST['txtMensagem']; // Mensagem enviada

    $mail->send();

    echo('<script>alert("Mensagem enviada");</script>');
    echo("<script>emailMarketing();</script>");
} catch (Exception $e) {
    echo($mail->ErrorInfo);
    echo('<script>alert("Mensagem não enviada");</script>');
    // echo 'Mensagem não enviada, verifique o erro: ', $mail->ErrorInfo;
    echo("<script>emailMarketing();</script>");
}
?>