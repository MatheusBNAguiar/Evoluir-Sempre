<?php
    session_start();
    global $error_login;
    require_once 'functions/process_user_login.php';
    if (isset($_POST['user_mail']) && isset($_POST['user_password'])){
        $user     = $_POST['user_mail'];
        $password = $_POST['user_password'];
        check_password_and_return_the_right_page($user,$password);
    }




?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Login</title>
	    <link type="text/css" rel="stylesheet" href="templates/style_login.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<h2> Evoluir Sempre </h2>
		</header>
		<article>
			<section id="section_1" class="visivel">
				<form id="form_1" method="post" action="">
					<p><input name="user_mail" id="email" placeholder="Email" type="text"></p>
					<p><input name="user_password" id="senha" placeholder="Senha" type="password"></p>
					<p><input type="submit" id="botao" value="Entrar"></p>
                    <?php

                        if($error_login == true){
                            echo<<<END
                            <div role="alert" class="alert alert-danger">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                                <span class="sr-only">Erro</span>
                                Usuário ou Senha Incorretos
                            </div>


END;

                        }
                    ?>
				</form>
			</section>
		</article>

	</body>
</html>
