<?php
 function show_avaliation(){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        $ID=$_SESSION['ID'];

    if($_SESSION['Cargo']=="pres"){
      $query  = "SELECT * FROM cadastro_avaliado";
    }
		else{
      $query  = "SELECT * FROM cadastro_avaliado where id_superior = $ID ";
    }
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
                   $tipo=treat_tipo_avaliacao($row[2]);


                    echo<<<END
                    <tr>
                        <th>$avaliado</th>
                        <th>$tipo</th>
                        <th>
                            <form action="" method="post">
                                <input name="worker_id" type="hidden" value="$row[4]">
                                <button class="btn btn-block btn-primary" name="see_value" type="submit">Visualizar</button>
                            </form>
                        </th>
                    </tr>
END;


                }
            $result->close();
         }

    }






?>
