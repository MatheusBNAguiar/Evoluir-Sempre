<?php
    session_start();

    require_once 'functions/handle_session.php';
    require_once 'functions/server_acess.php';
    require_once 'functions/take_worker_data.php';

    send_to_the_right_place("pres");

    if(isset($_POST['delete_value'])){
        delete_avaliation($_POST['form_id']);
    }
    if(isset($_POST['see_value'])){
        session_start();
        $_SESSION["ID_FORM"]=$_POST['form_id'];
        $_SESSION["Cargo_worker"]=$_POST['form_cargo'];
        header('Location:form_show.php');
    }
    
    if(isset($_POST['get_out'])){
        destroy_session_and_data();
    }
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
                <div class="col-md-10 col-xs-12">
                    <h2>Procurar avaliações</h2>
                    <div class="col-xs-12">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Nome do Avaliado</th>
                                    <th>Tipo de Avaliação</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php show_avaliation();?>
                            </tbody>
                        </table>

                    </div>
                
                
                </div>
                
            </div>
                    
                    
        </div>
            
            
        
	</body>
</html>
