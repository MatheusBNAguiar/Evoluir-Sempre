<?php
  function treat_date($data){
      $espaco=" ";
      $test=explode("-",$data);
      $meses=["Jan","Feb","Mar","Abr","May","Jun","Jul","Aug","Sep","Nov","Out","Dez"];
      $mes = $meses[(int)$test[1]];
      $newdata="{$test[2]}{$espaco}{$mes}{$espaco}{$test[0]}";
      return $newdata;

  }


  function treat_tipo_avaliacao($tipo){
    if($tipo=="financeiro")
        {return "Financeiro";}
    else if($tipo=="rep_comercial")
        {return "Representante Comercial";}
    else if($tipo=="televendedor")
        {return "Televendedor";}
    else if($tipo=="gerente_de_cd")
        {return " Gerente de CD";}

  }

/////////////////////////////////////////////////////
  function tratar_manager($person){
      require 'server_acess.php';
      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error) die($conn->connect_error);
      $query  = "SELECT nome_superior FROM cadastro_superior WHERE id_superior = $person ";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      while ($manager_row = $result->fetch_array(MYSQLI_NUM)) {
      return $manager_row[0];


  }}

  function tratar_worker($person){
      require 'server_acess.php';
      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error) die($conn->connect_error);
      $query  = "SELECT nome_avaliado FROM cadastro_avaliado WHERE id_avaliado= $person ";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      while ($worker_row = $result->fetch_array(MYSQLI_NUM)) {
      return $worker_row[0];
    }
  }












?>
