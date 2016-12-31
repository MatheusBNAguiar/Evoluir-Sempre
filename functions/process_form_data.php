<?php
function get_workers(){

    require_once 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "SELECT * FROM avaliado_table ";
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
                <option value="$row[2]">$row[0]</option>
END;
            }
        $result->close();
     }
}


function add_data($id_manager,$id_worker,$date,$cobranca,$informacoes,$avaliacoes,$qualidade,$money,$comentario,$area){
    require_once 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);


    $query  = "INSERT INTO avaliacoes_base(gerente_id,avaliado_id,data_de_avaliacao,notas1,notas2,notas3,notas4,pagamentos,comentario,area_de_trabalho) VALUES('$id_manager','$id_worker','$date','$cobranca','$informacoes','$avaliacoes','$qualidade','$money','$comentario','$area')";
    $result = $conn->query($query);


   if (!$result) die($conn->error);
    header("Location:manager_consulta_avaliacoes.php");
}










?>
