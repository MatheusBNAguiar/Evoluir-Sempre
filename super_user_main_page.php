<?php
    session_start();

    require_once 'functions/process_user_login.php';
    send_to_the_right_place("super_user");
    // Processo para Adicionar os Usuários quando o Formulário é enviado
    if(isset($_POST['get_out'])){
        destroy_session_and_data();
    }
    require_once 'functions/adding_and_deleting_user.php';
    if(isset($_POST['delete_value'])){
        delete_user_superior($_POST['delete_value']);
    }

    if(isset($_POST['add_user_name']) && isset($_POST['add_user_mail']) &&  isset($_POST['add_user_password']) &&  isset($_POST['add_user_job'])){
        add_user_superior($_POST['add_user_name'],$_POST['add_user_mail'],$_POST['add_user_password'],$_POST['add_user_job']);
    }

    // Processo para Deletar usuario caso o botao seja pressionado





?>
<html lang="pt-br">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Login</title>
	    <link type="text/css" rel="stylesheet" href="templates/style_super_user_main_page.css">
	    <link type="text/css" rel="stylesheet" href="templates/style_structure_of_pages.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	</head>
	<body>


        <div class="container-fluid row">
            <div class="col-xs-12 navbar">
                <a class="name"><?php   echo $_SESSION['Nome'];?></a>
                <form action="" method="post">
                        <button name="get_out" type="submit" class="btn link_out" href="">Sair</button></form>

            </div>

            <div class="col-md-2 col-xs-12 side_menu ">

            </div>

            <div class="col-md-10 col-xs-12">
                <h1> Adicionar Usuário</h1>
                <form action="" method="post" class="form-group">
                    <input class="form-control" name="add_user_name"  type="text" placeholder="Nome">
                    <input class="form-control" name="add_user_mail"  type="text" placeholder="E-mail">
                    <input class="form-control" name="add_user_password"  type="password" placeholder="Senha">
                    <select class="form-control" name="add_user_job"  type="text" placeholder="Cargo"  >
                      <option value="pres">Presidente</option>
                      <option value="ger">Gerente</option>
                        <option value="super_user">Super User</option>
                    </select>
                    <button class="btn btn-primary"type="submit">Adicionar</button>
                </form>

                
                    <table class="table table-striped col-xs-12">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Cargo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php show_user_superior(); ?>
                        </tbody>
                    </table>

                
            </div>
        </div>

	</body>
</html>











<?php






?>
