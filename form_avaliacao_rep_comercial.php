<?php
  session_start();
  require_once 'functions/process_user_login.php';
  require_once('functions/process_and_send_form_data.php');
  require_once 'functions/show_areas_that_can_be_used.php';
  send_to_the_right_place("ger");
  if(isset($_POST['get_out'])){
      destroy_session_and_data();
  }
  if(isset($_POST['enviar_formulario']) && isset($_POST['avaliado_name'])){
      $espaco    = " ";
      $travessao = "-";
      $data_aleatoria="03";

      $id_manager  = $_SESSION['ID'];
      $id_worker   = $_POST['avaliado_name'];
      $date        = "{$_POST['ano_envio']}{$travessao}{$_POST['mes_envio']}{$travessao}{$data_aleatoria}";


      $cobranca    ="{$_POST['question1_1'] }{$espaco}{$_POST['question2_1'] }{$espaco}{$_POST['question3_1'] }{$espaco}{$_POST['question4_1'] }{$espaco}{$_POST['question5_1'] }";
      $informacoes ="{$_POST['question1_2'] }{$espaco}{$_POST['question2_2'] }{$espaco}{$_POST['question3_2'] }{$espaco}{$_POST['question4_2'] }{$espaco}{$_POST['question5_2'] }";
      $avaliacoes ="{$_POST['question1_3'] }{$espaco}{$_POST['question2_3'] }{$espaco}{$_POST['question3_3'] }{$espaco}{$_POST['question4_3'] }{$espaco}{$_POST['question5_3'] }";
      $qualidade ="{$_POST['question1_4'] }{$espaco}{$_POST['question2_4'] }{$espaco}{$_POST['question3_4'] }{$espaco}{$_POST['question4_4'] }{$espaco}{$_POST['question5_4'] }{$espaco}{$_POST['question6_4'] }";

      $money="{$_POST['meta_money']}{$espaco}{$_POST['faturamento_money']}";
      $comentario = $_POST['comentario'];
      $area= $_POST['area_de_trabalho'];
      add_data($area,$id_manager,$id_worker,$date,$cobranca,$informacoes,$avaliacoes,$qualidade,$money,$comentario);
  }
?>
<html lang="pt-br">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>Login</title>
	    <link type="text/css" rel="stylesheet" href="templates/style_structure_of_pages.css">
        <link type="text/css" rel="stylesheet" href="templates/style_avaliacoes_create.css">
	    <link type="text/css" rel="stylesheet" href="templates/font-awesome-4.5.0/css/font-awesome.min.css">
	    <link type="text/css" rel="stylesheet" href="templates/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	</head>
	<body>
        <div class="container-fluid row">



                    <?php show_correct_bars($_SESSION['Cargo']);?>

                    <div class="col-md-10 col-xs-12 content ">
                        <h2>Avaliação Performance Representante Comercial</h2>
                        <form method="post" action="">
                            <input type="hidden" value="rep_comercial" name="area_de_trabalho">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Avaliado</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="avaliado_name" class="form-control">
                                                    <?php get_workers("rep_comercial",$_SESSION['ID']);?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Gestor</p>
                                        <p><?php echo $_SESSION['Nome'];?></p>
                                    </div>

                                    <div class=" col-xs-12 col-md-6 pergunta">
                                        <p>Mês</p>
                                        <div class="col-xs-12 col-sm-6 ">

                                            <select name="mes_envio" class="form-control">
                                                <option value="01">Jan</option>
                                                <option value="02">Fev</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Abr</option>
                                                <option value="05">Mai</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Ago</option>
                                                <option value="10">Set</option>
                                                <option value="09">Out</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dez</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-xs-12 col-md-6 pergunta">
                                        <p>Ano</p>
                                        <div class="col-xs-12 col-sm-6">
                                            <input name="ano_envio" type="number" min="2000" max="2999" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Cobrança</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Fiz lista de potenciais clientes da carteira pra fazer acordos.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question1_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Fizemos a tentativa de 5 acordos neste mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Tenho acompanhado o cumprimento do acordo por parte dos clientes e da Marin. </p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. A taxa de fechamento de acordos está em 80% ou mais.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>5. 50% do volume dos acordos foram faturados até o quinto dia útil.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question5_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Informações</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Visitei todos os clientes da carteira A e B neste mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Em pelo menos 2 clientes aconteceu treinamento técnico.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Planejei as visitas neste mês de acordo com as necessidades da região.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. Acompanhei a formulação das propostas.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>5. Acompanhei a implantação das propostas.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question5_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Avaliações de Crédito</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Diminuí a taxa de clientes inativos esse mês na minha região.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Apliquei a melhoria do PDV em, pelo menos, 3 clientes esse mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Ofereci a pelo menos um dos meus clientes treinamento para vendedores para entender melhor o valor dos produtos.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. Foi aberto um novo cliente esse mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>5. Consigo nos meus clientes visitar o estoque, afim de conseguir ter uma visão melhor sobre o que precisa ser pedido.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question5_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div></div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Qualidade no Atendimento</div>
                                <div class="panel-body">

                                    <div class="col-xs-12 pergunta">
                                        <p>1. Enviei a sat todos os dias do mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select  name="question1_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>2. Faço mais perguntas do que afirmações na minha venda.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question2_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>3. Estimulo e permito ao cliente falar mais do que eu.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question3_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>4. DAnotos os principais motivos pelos quais meus clientes não compraram e envio ao meu gestor.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question4_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>5. Utilizo perguntas ao ouvir objeções</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question5_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 pergunta">
                                        <p>6. Estou lendo algum livro neste mês.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question6_4"class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">

                                <div class="col-xs-12 col-md-6">
                                    <p>Meta</p>
                                    <input type="number" class="form-control" name="meta_money">
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <p>Faturamento</p>
                                    <input type="number" class="form-control" name="faturamento_money">
                                </div><div class="col-xs-12">
                                    <p>Comentários</p>
                                    <textarea name="comentario"class="form-control" rows="4">


                                    </textarea>

                                    </div>
                                    <button class="btn btn-primary" name="enviar_formulario">Confirmar Envio</button>
                                    </div>



                            </div>
                        </form>





                    </div>
                </div>
            </div>


        </div>


            </div>
        </div>
	</body><?php show_footer();?>
</html>
