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
                        <h2>Avaliação Performance Financeiro</h2>
                        <form method="post" action="">
                            <input type="hidden" value="financeiro" name="area_de_trabalho">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6 col-xs-12 pergunta">
                                        <p>Nome do Avaliado</p>
                                        <div class="col-xs-12 ">
                                            <select name="avaliado_name" class="form-control">
                                                <?php get_workers("financeiro",$_SESSION['ID']);?>
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
                                        <p>1. Liguei para todos os clientes inadimplentes do mês</p>
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
                                        <p>2. Recebi X cobranças de inadimplências</p>
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
                                        <p>3. Reduzi para % o percentual de inadimplência do mês </p>
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
                                        <p>4. Ligo para 60% ou mais dos clientes inadimplentes da carteira por dia</p>
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
                                        <p>5. Recebo 90% das dívidas de boleto atrasado em menos de 5 dias úteis</p>
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
                                        <p>1. Passei o relatório de inadimplência todas as semanas aos gerentes</p>
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
                                        <p>2. Informo sobre saldo disponível dos clientes aos vendedores e tlmk pontualmente</p>
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
                                        <p>3. Fiz uma lista de clientes com possíveis problemas de crédito e solicitei análise </p>
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
                                        <p>4. Anotei na planilha de ligações os principais motivos pelos quais os meus clientes não estão cumprindo o acordo de pagamento</p>
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
                                        <p>5. Mantenho a planilha de ligações atualizada</p>
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
                                        <p>1. Consegui mais de duas referências comerciais por cliente cadastrado</p>
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
                                        <p>2. Finalizei cadastro do cliente em menos de dois dias úteis</p>
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
                                        <p>3. Identifiquei a quantidade de clientes que extrapolaram o limite de crédito sem autorizaçãoe</p>
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
                                        <p>4. Consultei 20% ou mais da carteira ativa no serasa</p>
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
                                        <p>5. Consegui regularizar à situação de crédito para liberar novas compras aos clientes</p>
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
                                        <p>1. Tratei o cliente pelo nome</p>
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
                                        <p>2. Falei diretamente com quem é responsável pela dívida</p>
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
                                        <p>3. Repassei ao gestor informações importantes como reclamações de atendimento, venda com indício de fraude.</p>
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
                                        <p>4. Dou prioridade aos clientes com maior potencial, com maior dívida e com inadimplência recente.</p>
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
                                        <p>5. Todas as ligações sao registradas com horário e dia.</p>
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
                                        <p>6. Estou lendo um livro este mês.</p>
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
