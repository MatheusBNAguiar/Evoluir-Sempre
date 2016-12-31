<?php
    session_start();
    require_once 'functions/process_user_login.php';
    require_once 'functions/show_areas_that_can_be_used.php';
    send_to_the_right_place("ger");
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

        <?php show_correct_bars($_SESSION['Cargo']);?>

                <div class="col-xs-10 content ">

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Avaliação Financeiro</div>
                                </div>
                            </div>
                        </div>
                        <a href="form_avaliacao_financeiro.php">
                            <div class="panel-footer">
                                <span class="pull-left">Iniciar Avaliação</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Avaliação Televendedor</div>
                                </div>
                            </div>
                        </div>
                        <a href="form_avaliacao_televendedor.php">
                            <div class="panel-footer">
                                <span class="pull-left">Iniciar Avaliação</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>



                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Avaliação Gerente de CD</div>
                                </div>
                            </div>
                        </div>
                        <a href="form_avaliacao_gerente_de_cd.php">
                            <div class="panel-footer">
                                <span class="pull-left">Iniciar Avaliação</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Avaliação Representante Comercial</div>
                                </div>
                            </div>
                        </div>
                        <a href="form_avaliacao_rep_comercial.php">
                            <div class="panel-footer">
                                <span class="pull-left">Iniciar Avaliação</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                </div>


            </div>
        </div>
	</body>
  <?php show_footer();?>
</html>
