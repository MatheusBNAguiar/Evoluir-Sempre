<?php
function get_workers($cargo,$superior){

    require_once 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "SELECT * FROM cadastro_avaliado where cargo_avaliado='$cargo' and id_superior='$superior' ";
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
                <option value="$row[4]">$row[0]</option>
END;
            }
        $result->close();
     }
}


function add_data($cargo_correspondente,$id_manager,$id_worker,$date,$cobranca,$informacoes,$avaliacoes,$qualidade,$money,$comentario){
    require_once 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);


    $query  = "INSERT INTO form_submetido(cargo_correspondente,id_avaliado,id_superior,data_submissao,notas_1,notas_2,notas_3,notas_4,faturamento,comentarios) VALUES('$cargo_correspondente','$id_worker','$id_manager','$date','$cobranca','$informacoes','$avaliacoes','$qualidade','$money','$comentario')";
    $result = $conn->query($query);


   if (!$result) die($conn->error);
    header("Location:consulta_avaliacoes.php");
}










?>
