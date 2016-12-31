<?php   
 function show_users(){
    require 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "SELECT * FROM data_users WHERE user_job <> 'super_user' ";
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
                    <th>$row[2]</th>
                    <th>$row[3]</th>
                    <th>
                        <form action="" method="post">
                            <input name="delete_value" type="hidden" value="$row[4]"> 
                            <button class="btn btn-block btn-primary" type="submit">Deletar</button>
                        </form>
                    </th>
                </tr>
END;
            }
        $result->close();

     }
 }


function add_user($user,$mail,$password,$job){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $salt1    = "qm&h*";
    $salt2    = "pg!@";

    $token    = hash('ripemd128', "$salt1$password$salt2");

    $query  = "INSERT INTO data_users(user_name,user_hash_password,user_mail,user_job) VALUES('$user', '$token', '$mail', '$job')";
    $result = $conn->query($query);
    

    if (!$result) die();
    
}


function delete_user($code){
    require_once 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "DELETE FROM data_users WHERE code = $code ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    


}



?>

