
<?php   
 function show_users(){
    require 'functions/server_acess.php';
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
                <tr>
                    <th>$row[0]</th>
                    <th>$row[1]</th>
                    
                    <th>
                        <form action="" method="post">
                            <input name="delete_value" type="hidden" value="$row[2]"> 
                            <button class="btn btn-block btn-primary" type="submit">Deletar</button>
                        </form>
                    </th>
                </tr>
END;
            }
        $result->close();

     }
 }


function add_user($user,$mail){
    require 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $query  = "INSERT INTO avaliado_table(avaliado_name,avaliado_mail) VALUES('$user','$mail')";
    $result = $conn->query($query);
    if (!$result) die();
    
}


function delete_user($code){
    require 'functions/server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "DELETE FROM avaliado_table WHERE avaliado_id = $code ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    
    


}



?>