<?php 
    session_start();
    require_once 'functions/handle_session.php';
    send_to_the_right_place("pres");
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
                <a class="link_menu" href="pres_main_page.php">
                    <i class="fa fa-home"></i>
                    Home
                </a>

                
                <a class="link_menu" href="pres_consulta_avaliacoes.php">
                    <i class="fa fa-search">
                    </i>
                    Visualizar</a>

                
            </div>
                <div class="col-xs-10 content ">
                 
                    <div class="col-lg-4 col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-search fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Consultar Avaliações</div>
                                </div>
                            </div>
                        </div>
                        <a href="pres_consulta_avaliacoes.php">
                            <div class="panel-footer">
                                <span class="pull-left">Consultar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                    

                    
                </div>
            
            
          
        </div>
	</body>
</html>
