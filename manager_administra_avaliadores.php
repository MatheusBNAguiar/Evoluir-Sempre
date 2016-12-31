<?php
    session_start();
    require_once 'functions/handle_session.php';

    send_to_the_right_place("ger");
    if(isset($_POST['get_out'])){
        destroy_session_and_data();
    }
    require_once 'functions/process_user_manager.php';
    if(isset($_POST['delete_value'])){
        delete_user($_POST['delete_value']);
        
    }
    
    
    // Processo para Adicionar os Usuários quando o Formulário é enviado
    if(isset($_POST['add_user_name']) && isset($_POST['add_user_mail'])){
        add_user($_POST['add_user_name'],$_POST['add_user_mail']);
    }
    // Processo para Deletar usuario caso o botao seja pressionado

 
    

?>

<html lang="pt-br">

    
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    
	    <title>Login</title>    
	    <link type="text/css" rel="stylesheet" href="templates/style_structure_of_pages.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	</head>
	<body>
        
        <div class="container-fluid row">
             <div class="col-xs-12 navbar">
                    <a class="name"><?php echo $_SESSION['Nome'];?></a>
                    <form action="" method="post">
                            <button name="get_out" type="submit" class="btn link_out" href="">Sair</button></form>
                
            </div>
            
            <div class="col-md-2 col-xs-12 side_menu ">
                <a class="link_menu" href="manager_main_page.php">
                    <i class="fa fa-home"></i>
                    Home
                </a>
                <a class="link_menu" href="manager_make_avaliacoes.php"><i class="fa fa-tasks">
                    </i>
                    Fazer análise
                </a>
                
                <a class="link_menu" href="manager_consulta_avaliacoes.php">
                    <i class="fa fa-search">
                    </i>
                    Visualizar</a>
                <a class="link_menu" href="manager_administra_avaliadores.php">
                    <i class="fa fa-group">
                    </i> Administrar avaliados
                </a>
                
            </div>
                <div class="col-xs-12 col-md-10 content ">
                
                <div class=" col-md-8 col-xs-12">
                    <h1> Adicionar Supervisionado</h1>
                    <form action="" method="post" class="form-group">
                        <input class="form-control" name="add_user_name"  type="text" placeholder="Nome">
                        <input class="form-control" name="add_user_mail"  type="text" placeholder="E-mail">
                        <button class="btn btn-primary"type="submit">Adicionar</button>
                    
                    
                    </form>
                
                </div>
                            
                <div class="col-xs-12">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php show_users(); ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            </div></div>
	</body>
</html>
