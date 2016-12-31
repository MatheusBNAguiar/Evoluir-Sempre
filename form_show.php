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
          <div class="col-md-10 col-xs-12  content ">
            <?php
              show_whorker_and_manager();
              show_available_data();
              ?>
          <div class="col-xs-12 row">
            <?php
              if(isset($_POST['id_do_form'])){
              if($_POST['id_do_form']=="compilado"){
                echo<<<END
                <div class="panel panel-default">
                  <div class="divChartTrends0 panel-heading"></div>
                  <div class="panel-body" >
                    <div id="divChartTrends0"></div>
                  </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends1 panel-heading"></div>
                <div class="panel-body" >
                  <div id="divChartTrends1"></div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends2 panel-heading"></div>
                <div class="panel-body" >
                  <div id="divChartTrends2"></div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends3 panel-heading"></div>
                <div class="panel-body" >
                  <div id="divChartTrends3"></div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends4 panel-heading"></div>
                <div class="panel-body" >
                  <div id="divChartTrends4"></div>
                </div>
                </div>

END;
                }
              else if($_POST['id_do_form']!=""){
                $data_to_use = create_data_partial();
                $first_title=$data_to_use[0][0];
                $second_title=$data_to_use[0][1];
                $third_title=$data_to_use[0][2];
                $fourth_title=$data_to_use[0][3];
                $fifth_title=$data_to_use[0][4];
                echo<<<END
                <div class="panel panel-default">
                  <div class="divChartTrends0 panel-heading">
                  <h2>$first_title</h2>
                  </div>
                  <div class="panel-body" >
                    <div id="divChartTrends0"></div>
                    <svg class="chart0">

                    </svg>
                  </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends1 panel-heading"><h2>$second_title</h2></div>
                <div class="panel-body" >
                  <div id="divChartTrends1"></div>
                  <svg class="chart1">

                  </svg>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends2 panel-heading"><h2>$third_title</h2></div>
                <div class="panel-body" >
                  <div id="divChartTrends2"></div>
                  <svg class="chart2">

                  </svg>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends3 panel-heading"><h2>$fourth_title</h2></div>
                <div class="panel-body" >
                  <div id="divChartTrends3"></div>
                  <svg class="chart3">

                  </svg>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="divChartTrends4 panel-heading"><h2>$fifth_title</h2></div>
                <div class="panel-body" >
                  <div id="divChartTrends4"></div>
                  <svg class="chart4">
                  </svg>
                </div>
                </div>

END;
                }
              }
            ?>

          </div>
        </div>

	</body>
  <?php show_footer();?>
  <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
  <?php
  if(isset($_POST['id_do_form'])){
    if($_POST['id_do_form']=="compilado"){
      $compilado=json_encode(create_data_final_avaliation());
      echo<<<END
      <script type=text/javascript>
        var variavel_chart= $compilado;
      </script>
      <script src="scripts/form_show_compilated_graphics.js" charset="utf-8"></script>
END;
    }
    else if($_POST['id_do_form']!=""){
      $variavel_chart1=$data_to_use[1];
      $variavel_chart2=$data_to_use[2];
      $variavel_chart3=$data_to_use[3];
      $variavel_chart4=$data_to_use[4];
      $variavel_chart5=$data_to_use[5];
      echo<<<END
      <script>
      var variavel_chart1=$variavel_chart1;
      var variavel_chart2=$variavel_chart2;
      var variavel_chart3=$variavel_chart3;
      var variavel_chart4=$variavel_chart4;
      var variavel_chart5=$variavel_chart5;

      </script>
      <script src="scripts/form_show_single_graphics.js" charset="utf-8"></script>
END;
    }
  }
  ?>


</html>
