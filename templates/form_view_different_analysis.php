<?php
        session_start();
        require_once 'functions/process_user_login.php';

        if(isset($_POST['get_out'])){
            destroy_session_and_data();
        }
        require_once 'functions/process_user_login.php';
        require_once 'functions/show_areas_that_can_be_used.php';
        require_once 'functions/treat_strings.php';
        require_once 'functions/handle_form_show_data.php';


    ?>


<html lang="pt-br">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Login</title>
	    <link type="text/css" rel="stylesheet" href="templates/style_structure_of_pages.css">
      <link type="text/css" rel="stylesheet" href="templates/graph_style.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
      <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	</head>
	<body>
    <div class="container-fluid row">
      <?php show_correct_bars($_SESSION['Cargo']);?>
    </body>
