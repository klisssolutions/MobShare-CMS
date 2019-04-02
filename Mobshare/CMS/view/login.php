<html>
	<head>
		<title>
			Sistema de Gerenciamento de Conteudo
		</title>
         <link rel="stylesheet" type="text/css" href="view/css/style.css">
         <script type="text/javascript" src="view/js/jquery.js"></script>
        <script type="text/javascript" src="view/js/ajax.js"></script>
        <link rel="shortcut icon" href="view/imagens/settings.png" />
	</head>
	<body>
        <!--Primeiro o Login depois a Home
Nao é necessario ficar em uma pasta a parte
-->
        <div class="principal-login">
            <div class="box-login">
                <img src="view/imagens/logo.png" class="logomarca">
                <p>CMS - Sistema de Gerenciamento de Conteudo</p>
                <form id="form" name="form">
                    <div class="txt-login">
                        E-mail: 
                    </div>
                    <div class="input-login">
                        <input type="email" class="ipt-login" name="txtemail" size="30" required>
                    </div>
                    <div class="txt-login">
                        Senha: 
                    </div>
                    <div class="input-login">
                        <input type="password" class="ipt-login" name="txtsenha" size="30" required>
                    </div>
                    <div class="botao">
                        <input type="submit" class="btn-login" value="Logar" id="login" onclick="logar()">
                    </div>
                </form>
            </div>
        </div>
        
	</body>
</html>
