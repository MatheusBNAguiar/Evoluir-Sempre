<?php

//Superiores
function show_user_superior(){
   require 'server_acess.php';
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);

   $query  = "SELECT * FROM cadastro_superior WHERE cargo_superior <> 'super_user' ";
   if($_SESSION['Cargo']=="pres"){ $query  = "SELECT * FROM cadastro_superior WHERE cargo_superior <> 'super_user' and cargo_superior <> 'pres'";}
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   elseif ($result->num_rows)
       {
           $rows = $result->num_rows;
           for ($j = 0 ; $j < $rows ; ++$j)
           {
               $result->data_seek($j);
               $row = $result->fetch_array(MYSQLI_NUM);
               echo<<<END
               <tr>
                   <th>$row[1]</th>
                   <th>$row[4]</th>
                   <th>$row[2]</th>
                   <th>
                       <form action="" method="post">
                           <input name="delete_value" type="hidden" value="$row[0]">
                           <button class="btn btn-block btn-danger" type="submit">Deletar</button>
                       </form>
                   </th>
               </tr>
END;
           }
       $result->close();
    }
}

function add_user_superior($user,$mail,$password,$job){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $salt1    = "qm&h*";
    $salt2    = "pg!@";

    $token    = hash('ripemd128', "$salt1$password$salt2");

    $query  = "INSERT INTO cadastro_superior(nome_superior,cargo_superior,senha_superior,email_superior) VALUES('$user', '$job', '$token', '$mail')";
    $result = $conn->query($query);

    if (!$result) die();

}

function delete_user_superior($id){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "DELETE FROM cadastro_superior WHERE id_superior = $id ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
}

//Avaliados
function show_user_avaliado($id_superior){
   require 'server_acess.php';
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);

   $query  = "SELECT * FROM cadastro_avaliado WHERE id_superior='$id_superior'";
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   elseif ($result->num_rows)
       {
           $rows = $result->num_rows;
           for ($j = 0 ; $j < $rows ; ++$j)
           {
               $result->data_seek($j);
               $row = $result->fetch_array(MYSQLI_NUM);
               $cargo=treat_tipo_avaliacao($row[2]);
               echo<<<END
               <tr>
                   <th>$row[0]</th>
                   <th>$cargo</th>
                   <th>$row[1]</th>
                   <th>
                       <form action="" method="post">
                           <input name="delete_value" type="hidden" value="$row[4]">
                           <button class="btn btn-block btn-danger" type="submit">Deletar</button>
                       </form>
                   </th>
               </tr>
END;
           }
       $result->close();
    }
}

function add_user_avaliado($user,$job,$supervisor,$mail){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "INSERT INTO cadastro_avaliado(nome_avaliado,cargo_avaliado,id_superior,email_avaliado) VALUES('$user', '$job', '$supervisor', '$mail')";
    $result = $conn->query($query);

    if (!$result) die();
}

function delete_user_avaliado($id){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "DELETE FROM cadastro_avaliado WHERE id_avaliado = $id ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    $query  = "DELETE FROM form_submetido WHERE id_avaliado = $id ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);



}


?>
