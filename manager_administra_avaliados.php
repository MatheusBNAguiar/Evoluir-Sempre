<?php
    session_start();
    require_once 'functions/treat_strings.php';
    require_once 'functions/process_user_login.php';
    require_once 'functions/show_areas_that_can_be_used.php';
    send_to_the_right_place("ger");
    if(isset($_POST['get_out'])){
        destroy_session_and_data();
    }
    require_once 'functions/adding_and_deleting_user.php';
    if(isset($_POST['delete_value'])){
        delete_user_avaliado($_POST['delete_value']);

    }


    // Processo para Adicionar os Usuários quando o Formulário é enviado
    if(isset($_POST['add_user_name']) && isset($_POST['add_user_mail'])){
        add_user_avaliado($_POST['add_user_name'],$_POST['add_user_cargo'],$_SESSION['ID'],$_POST['add_user_mail']);
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

        <?php show_correct_bars($_SESSION['Cargo']);?>
                <div class="col-xs-12 col-md-10 content ">

                <div class=" col-md-8 col-xs-12">
                    <h1> Adicionar Supervisionado</h1>
                    <form action="" method="post" class="form-group">
                        <input class="form-control" name="add_user_name"  type="text" placeholder="Nome">
                        <input class="form-control" name="add_user_mail"  type="text" placeholder="E-mail">
                        <select name="add_user_cargo" class="form-control">
                          <option value="rep_comercial">Representante Comercial</option>
                          <option value="gerente_de_cd">Gerente de CD</option>
                          <option value="financeiro">Financeiro</option>
                          <option value="televendedor" selected>Televendedor</option>
                        </select>
                        <button class="btn btn-primary"type="submit">Adicionar</button>


                    </form>

                </div>

                <div class="col-xs-12">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cargo</th>
                                <th>E-Mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php show_user_avaliado($_SESSION['ID']); ?>
                        </tbody>
                    </table>

                </div>
            </div>
            </div></div>
	</body><?php show_footer();?>
</html>
