<?php

function show_whorker_and_manager(){
  require_once 'functions/server_acess.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  $id_do_avaliado=$_SESSION['ID_WORKER'];
  $query  = "SELECT * FROM form_submetido where id_avaliado=$id_do_avaliado";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  else{
      $result  = $result->fetch_assoc();
      $manager = tratar_manager($result['id_superior']);
      $worker  = tratar_worker($result['id_avaliado']);
      echo<<<END
        <div class="panel panel-default">
          <div class="panel-heading ">
            <h3>Avaliador: $manager</h3>
            <h3>Avaliado : $worker</h3>
          </div>
END;
  }
}


function show_available_data(){
  require 'server_acess.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  $id_do_avaliado=$_SESSION['ID_WORKER'];
  $query  = "SELECT * FROM form_submetido where id_avaliado=$id_do_avaliado";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  elseif ($result->num_rows){
    $rows = $result->num_rows;
    echo('<div class="panel-body "><form action="" method="post">');
    for ($j = 0 ; $j < $rows ; ++$j)
    {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);
      $data=treat_date($row[3]);
      echo<<<END
      <button type="submit" class="btn btn-primary col-md-3 col-xs-6" name="id_do_form" value="$row[10]">$data</button>
END;
    }
      if($rows>1){
        echo<<<END
        <button type="submit" class="btn btn-primary col-md-3 col-xs-6" name="id_do_form" value="compilado">Compilado</button>
END;
  }
      echo('</form></div></div>');
    }
}


function create_data_partial(){
  require 'server_acess.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $id_do_form=$_POST['id_do_form'];
  $query  = "SELECT * FROM form_submetido where id_do_form=$id_do_form";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  else{
      $res = $result->fetch_assoc();
      $data_de_avaliacao=$res['data_submissao'];
      $notas1=explode(' ',$res['notas_1']);
      $notas2=explode(' ',$res['notas_2']);
      $notas3=explode(' ',$res['notas_3']);
      $notas4=explode(' ',$res['notas_4']);
      $pagamentos = explode(' ',$res['faturamento']);
      $comentario = $res['comentarios'];
      $area_de_trabalho = $res['cargo_correspondente'];

      $media1 = calculate_media($notas1);
      $media2 = calculate_media($notas2);
      $media3 = calculate_media($notas3);
      $media4 = calculate_media($notas4);

      $faturamento          = calculate_percentage($pagamentos);
      $aproveitamento       = array($media1,$media2,$media3,$media4,$faturamento);
      $aproveitamento_final = soma_dados_array($aproveitamento)*4;

  }


  if($area_de_trabalho=='rep_comercial' or $area_de_trabalho=='gerente_de_cd'){
      $titulo1 = "Engajamento nos Acordos";
      $titulo2 = "Carteira A e B";
      $titulo3 = "Potencialização de Vendas";
      $titulo4 = "Potencializadores de Conversão";
      $descricao1 = ['Prospecção','Abordagem','Acompanhamento','Fechamento','Spice'];
      $descricao2= ['Visitas','Treinamento','Planejamento','Propostas','Engajamento'];
      $descricao3 = ['Clientes inativos','PDV','Preço elevado','Novos clientes','Problemas em regiões'];
      $descricao4 = ['Produtividade','Treinamento Roda Das Vendas','Feedback','Cuidado','Objeções','Leitura'];

  }

  else if($area_de_trabalho=="financeiro"){
      $titulo1 = "Cobrança";
      $titulo2 = "Informações";
      $titulo3 = "Avaliações de Crédito";
      $titulo4 = "Qualidade no atendimento";
      $descricao1 = ['Contato','Ressarcimento','Inadimplência','Carteira inadimplente','Tempo de reguralização'];
      $descricao2= ['Relatório de inadimplência','Saldos clientes','Clientes suspeitos','Desculpas de clientes','Planilha de ligações'];
      $descricao3 = ['Referências comerciais','Tempo de cadastro','Limite de crédito','Consulta serasa','Clientes bloqueados'];
      $descricao4 = ['Identificaçao','Decisor','Informaçoes importantes','Prioridades','Controle','Leitura'];
      }
  else if($area_de_trabalho=="televendedor"){
      $titulo1 = "Aborgadem Inicial";
      $titulo2 = "Potencializadores de Vendas";
      $titulo3 = "Potencialização de Conversão";
      $titulo4 = "Finalização";
      $descricao1 = ['Identificação','Informações','Compra'];
      $descricao2= ['PNL','Abordagem','Oferta','Adicional','Informação/Produto'];
      $descricao3 = ['Controle','Cuidado','DEV','Perguntas','Feedback','Participação','Objeções','Leitura'];
      $descricao4 = ['Pagamento e Entrega ','Agradecimento','Finalização'];

  }

  $agrupamento_titulos =array($titulo1,$titulo2,$titulo3,$titulo4,"Faturamento/Meta");


  $nota_descricao1=group_nota_categoria_partial($notas1,$descricao1);
  $nota_descricao2=group_nota_categoria_partial($notas2,$descricao2);
  $nota_descricao3=group_nota_categoria_partial($notas3,$descricao3);
  $nota_descricao4=group_nota_categoria_partial($notas4,$descricao4);
  $nota_descricao5=group_nota_categoria_partial($aproveitamento,$agrupamento_titulos);
  return array($agrupamento_titulos,$nota_descricao1,$nota_descricao2,$nota_descricao3,$nota_descricao4,$nota_descricao5);

}






  function create_data_final_avaliation(){
    $datas_de_avaliacao=[];
    $notas_compilado1=[];
    $notas_compilado2=[];
    $notas_compilado3=[];
    $notas_compilado4=[];
    $aproveitamento_compilado=[];

    require 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $id_do_avaliado=$_SESSION['ID_WORKER'];
    $query  = "SELECT * FROM form_submetido where id_avaliado=$id_do_avaliado ORDER BY data_submissao ASC";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    elseif ($result->num_rows){
      $rows = $result->num_rows;
      for ($j = 0 ; $j < $rows ; ++$j)
      {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);

        $data_de_avaliacao=treat_date($row[3]);
        $notas1=explode(' ',$row[4]);
        $notas2=explode(' ',$row[5]);
        $notas3=explode(' ',$row[6]);
        $notas4=explode(' ',$row[7]);

        $pagamentos = explode(' ',$row[8]);

        $media1 = calculate_media($notas1);
        $media2 = calculate_media($notas2);
        $media3 = calculate_media($notas3);
        $media4 = calculate_media($notas4);

        $faturamento          = calculate_percentage($pagamentos);
        $aproveitamento       = array($media1,$media2,$media3,$media4,$faturamento);
        $aproveitamento_final = soma_dados_array($aproveitamento)*4;

        array_push($notas_compilado1,$notas1);
        array_push($notas_compilado2,$notas2);
        array_push($notas_compilado3,$notas3);
        array_push($notas_compilado4,$notas4);
        array_push($aproveitamento_compilado,$aproveitamento);
        array_push($datas_de_avaliacao,$data_de_avaliacao);



    if($row[0]=='rep_comercial' or $row[0]=='gerente_de_cd'){
        $titulo1 = "Engajamento nos Acordos";
        $titulo2 = "Carteira A e B";
        $titulo3 = "Potencialização de Vendas";
        $titulo4 = "Potencializadores de Conversão";
        $descricao1 = ['Prospecção','Abordagem','Acompanhamento','Fechamento','Spice'];
        $descricao2= ['Visitas','Treinamento','Planejamento','Propostas','Engajamento'];
        $descricao3 = ['Clientes inativos','PDV','Preço elevado','Novos clientes','Problemas em regiões'];
        $descricao4 = ['Produtividade','Treinamento Roda Das Vendas','Feedback','Cuidado','Objeções','Leitura'];

    }

    else if($row[0]=="financeiro"){
        $titulo1 = "Cobrança";
        $titulo2 = "Informações";
        $titulo3 = "Avaliações de Crédito";
        $titulo4 = "Qualidade no atendimento";
        $descricao1 = ['Contato','Ressarcimento','Inadimplência','Carteira inadimplente','Tempo de reguralização'];
        $descricao2= ['Relatório de inadimplência','Saldos clientes','Clientes suspeitos','Desculpas de clientes','Planilha de ligações'];
        $descricao3 = ['Referências comerciais','Tempo de cadastro','Limite de crédito','Consulta serasa','Clientes bloqueados'];
        $descricao4 = ['Identificaçao','Decisor','Informaçoes importantes','Prioridades','Controle','Leitura'];
        }
    else if($row[0]=="televendedor"){
        $titulo1 = "Aborgadem Inicial";
        $titulo2 = "Potencializadores de Vendas";
        $titulo3 = "Potencialização de Conversão";
        $titulo4 = "Finalização";
        $descricao1 = ['Identificação','Informações','Compra'];
        $descricao2= ['PNL','Abordagem','Oferta','Adicional','Informação/Produto'];
        $descricao3 = ['Controle','Cuidado','DEV','Perguntas','Feedback','Participação','Objeções','Leitura'];
        $descricao4 = ['Pagamento e Entrega ','Agradecimento','Finalização'];

    }

  }
}
    $titulos_final=[$titulo1,$titulo2,$titulo3,$titulo4,"Faturamento"];
    $categoria1=group_nota_categoria($titulo1,$descricao1,$datas_de_avaliacao,$notas_compilado1);
    $categoria2=group_nota_categoria($titulo2,$descricao2,$datas_de_avaliacao,$notas_compilado2);
    $categoria3=group_nota_categoria($titulo3,$descricao3,$datas_de_avaliacao,$notas_compilado3);
    $categoria4=group_nota_categoria($titulo4,$descricao4,$datas_de_avaliacao,$notas_compilado4);
    $categoriafinal=group_nota_categoria("Total",$titulos_final,$datas_de_avaliacao,$aproveitamento_compilado);
    return array($categoria1,$categoria2,$categoria3,$categoria4,$categoriafinal);



  }



function group_nota_categoria($title,$descriptions,$dates_of_submission,$rates){
    $final_array = [];
    $array_with_category_included=[];

    for($description_index = 0;
        $description_index < count($descriptions);
        $description_index++               ){
          $array_of_rates = [];

          for($dates_index = 0; $dates_index < count($dates_of_submission); $dates_index++ ){
                $array_of_rates[]=array("DateSubm"=>$dates_of_submission[$dates_index],"Rate"=>(int)$rates[$dates_index][$description_index]);
              }
          $array_with_category_included[]=array("Category"=>$descriptions[$description_index],"Avaliations"=>$array_of_rates);

    }
    $final_array[]=array("Section Name"=>$title,"Section Content"=>$array_with_category_included);

    return $final_array;



}
function soma_dados_array($questoes){
        $soma=0;
        $arr_length = count($questoes);
        for($i=0;$i<$arr_length;$i++)
        {
            $soma = $soma + intval($questoes[$i]);
        }
        return $soma;

}
function calculate_media($questoes){
        $soma=0;
        $arr_length = count($questoes);
        $soma  =  soma_dados_array($questoes);
        $media = $soma/$arr_length;
        return $media;
    }
function calculate_percentage($dindin){
        $media=($dindin[1]/$dindin[0])*5;
        if($media>5.0){$media=5.0;}
        return $media;
}

function group_nota_categoria_partial($nota,$categoria){
    $new_array=array();
    $arr_length = count($categoria);
    for($i=0;$i<$arr_length;$i++){
        $new_array[]=array("Categoria"=>$categoria[$i],"Nota"=>$nota[$i]);

    }
    return json_encode($new_array);



}






?>
