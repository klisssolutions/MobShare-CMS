<html>
	<head>
		<title>
			CMS
		</title>
         <link rel="stylesheet" type="text/css" href="view/css/style.css">
         <script type="text/javascript" src="view/js/jquery.js"></script>
        <script type="text/javascript" src="view/js/ajax.js"></script>
	</head>
	<body>
        <!--Primeiro o Login depois a Home
Nao é necessario ficar em uma pasta a parte
-->
        <div class="principal" id="principal">
            <div class="sistema">
            
                <img src="view/imagens/logo.png" class="logomarca">
                <p>CMS - Sistema de Gerenciamento de Conteudo</p>
            
            </div>
            <div class="sistema">
                <form id="form" name="form">
                    
                    <div class="label">Login: </div>
                    <div class="input"><input type="text" name="txtnome" size="30"></div><br>
                    <div class="label">Senha: </div>
                    <div class="input"><input type="password" name="txtsenha" size="30"></div><br>
                    <div class="botao">
                        <input type="submit" value="Logar" id="login" onclick="logar()">
                    </div>
                </form>
            </div>
        </div>
        
	</body>
</html>
