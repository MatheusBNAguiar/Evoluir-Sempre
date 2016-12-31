<?php
    session_start();
    require_once 'functions/process_user_login.php';
    send_to_the_right_place("ger");
    if(isset($_POST['get_out'])){
        destroy_session_and_data();
    }

    require_once 'functions/show_areas_that_can_be_used.php';
    require_once('functions/process_and_send_form_data.php');
    if(isset($_POST['enviar_formulario'])&& isset($_POST['avaliado_name'])){

        $espaco    = " ";
        $travessao = "-";
        $data_aleatoria="03";

        $id_manager  = $_SESSION['ID'];
        $id_worker   = $_POST['avaliado_name'];
        $date        = "{$_POST['ano_envio']}{$travessao}{$_POST['mes_envio']}{$travessao}{$data_aleatoria}";


        $cobranca    ="{$_POST['question1_1'] }{$espaco}{$_POST['question2_1'] }{$espaco}{$_POST['question3_1'] }{$espaco}{$_POST['question4_1'] }{$espaco}{$_POST['question5_1'] }
                        ";

        $informacoes ="{$_POST['question1_2'] }{$espaco}{$_POST['question2_2'] }{$espaco}{$_POST['question3_2'] }{$espaco}{$_POST['question4_2'] }{$espaco}{$_POST['question5_2'] }";

        $avaliacoes ="{$_POST['question1_3']}{$espaco}{$_POST['question2_3']}{$espaco}{$_POST['question3_3']}{$espaco}{$_POST['question4_3']}{$espaco}{$_POST['question5_3']}";

        $qualidade ="{$_POST['question1_4'] }{$espaco}{$_POST['question2_4'] }{$espaco}{$_POST['question3_4'] }{$espaco}{$_POST['question4_4'] }{$espaco}{$_POST['question5_4'] }{$espaco}{$_POST['question6_4'] }";

        $money="{$_POST['meta_money']}{$espaco}{$_POST['faturamento_money']}
                ";

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

            <?php show_correct_bars($_SESSION['Cargo']);?>
                    <div class="col-md-10 col-xs-12 content ">
                        <h2>Avaliação Performance Gerente de CD</h2>
                        <form method="post" action="">
                            <input type="hidden" value="gerente_de_cd" name="area_de_trabalho">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Avaliado </p>
                                            <select name="avaliado_name" class="form-control">
                                                <?php get_workers("gerente_de_cd",$_SESSION['ID']);?>
                                            </select>
                                    </div>

                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Avaliador</p>
                                        <p><b><?php echo $_SESSION['Nome'];?></b></p>
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
                                        <p>1. Os representantes fizeram o planejamento de acordos para os clientes em potencial</p>
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
                                        <p>2. Foi visitado junto com o representante pelo menos 2 clientes com potencial de acordo pra mudança de faixa.</p>
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
                                        <p>3. Tenho acompanhado o cumprimento do acordo por parte dos clientes e da Marin.</p>
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
                                        <p>1. Garanti que todos os clientes da carteira A e B fossem visitados neste mês.</p>
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
                                        <p>2. Mantive na minha região a média de 2 treinamentos técnicos por representante.</p>
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
                                        <p>3. Supervisionei e auxiliei o planejamento de visitas dos vendedores de acordo com as características da região atuante</p>
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
                                        <p>4. Foram apresentadas pelo menos 4 propostas de acordo por representante na minha região e eu sei os resultados.</p>
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
                                        <p>5. Acompanhei a implantação das propostas dos clientes da carteira A de clientes.</p>
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
                                        <p>1. A taxa de inativos da minha região foi diminuída em 15%.</p>
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
                                        <p>2. Garanti a aplicação da melhoria do PDV em, pelo menos, 3 clientes da carteira de cada representante esse mês.</p>
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
                                        <p>3. Garanti a aplicação de treinamento do treinamento proposta de valor neste mês, e supervisionei os resultados.</p>
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
                                        <p>4. Foi aberto um novo cliente por representante esse mês.</p>
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
                                        <p>5. Apresentei plano de ação para a região com maior dificuldade no mês anterior.</p>
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
                                        <p>1. Garanti que os representantes enviassem a Sat  todos os dias do mês.</p>
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
                                        <p>2. Identifiquei nas visitas os principais problemas em habilidades em vendas de acordo com a Roda das Vendas.</p>
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
                                        <p>3. Foi realizada a Avaliação de Desempenho este mês com todos os represntantes da carteira e enviado aos responsáveis.</p>
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
                                        <p>4. Recebi de todos os representantes da carteira, as principais o objeções dos clientes.</p>
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
                                        <p>5. Identifiquei quais os principais ofensores de mercado e tracei uma estratégia para cada região.</p>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <select name="question5_4" class="form-control">
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
                                </div>

                                <div class="col-xs-12">
                                    <p>Comentários</p>
                                    <textarea name="comentario"class="form-control" rows="4">


                                    </textarea>

                                    </div>
                                    <button class="btn btn-primary" type="submit" name="enviar_formulario">Confirmar Envio</button>
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
