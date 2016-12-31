<?php
 function show_avaliation(){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        $ID=$_SESSION['ID'];
	 	if($_SESSION['Cargo']=="pres"){$query  = "SELECT * FROM avaliado_table";}
		else{$query  = "SELECT * FROM avaliado_table where gerente_id = $ID ";}
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        elseif ($result->num_rows)
            {
                $rows = $result->num_rows;
                for ($j = 0 ; $j < $rows ; ++$j)
                {
                    $result->data_seek($j);
                    $row = $result->fetch_array(MYSQLI_NUM);
                   $avaliado = $row[0];
                   $tipo=tipo_avaliacao($row[1]);


                    echo<<<END
                    <tr>
                        <th>$avaliado</th>
                        <th>$tipo</th>
                        <th>
                            <form action="" method="post">
                                <input name="form_cargo" type="hidden" value="$row[1]">
                                <input name="worker_id" type="hidden" value="$row[3]">
                                <button class="btn btn-block btn-primary" name="see_value" type="submit">Visualizar</button>
                                <button class="btn btn-block btn-danger" name="delete_value"type="submit">Deletar</button>
                            </form>
                        </th>
                    </tr>
END;


                }
            $result->close();
         }

    }

    function tratar_manager($person){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        $query  = "SELECT user_name FROM data_users WHERE code = $person ";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
        return $row[0];


    }}

    function tratar_worker($person){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        $query  = "SELECT avaliado_name FROM avaliado_table WHERE avaliado_id= $person ";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
        return $row[0];
 }


    }

    function tratar_data($data){
        $travessao="-";
        $test=explode("-",$data);
        $newdata="{$test[1]}{$travessao}{$test[0]}";
        return $newdata;

    }


    function delete_avaliation($id){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $query  = "DELETE FROM avaliacoes_base WHERE id_do_form = $id ";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        header("Location:manager_consulta_avaliacoes.php");


    }

    function tipo_avaliacao($tipo){
    if($tipo=="financeiro")
        {return "Perfomance Financeiro";}
    else if($tipo=="rep_comercial")
        {return "Perfomance Representante Comercial";}
    else if($tipo=="televendedor")
        {return "Perfomance Televendedor";}
    else if($tipo=="gerente_de_cd")
        {return "Perfomance Gerente de CD";}



    }


?>
