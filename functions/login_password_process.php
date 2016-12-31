<?php
    function convert_password_hash($password){
        $password = $password;
        $salt1    = "qm&h*";
        $salt2    = "pg!@";
        $token    = hash('ripemd128', "$salt1$password$salt2");
        return $token;
    }
     function check_password_and_return_the_right_page($user,$password){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        
        $query  = "SELECT * FROM data_users WHERE user_mail='$user'";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        elseif ($result->num_rows)
        {        
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
              $salt1 = "qm&h*";
              $salt2 = "pg!@";
              $token = hash('ripemd128', "$salt1$password$salt2");
              if ($token == $row[1]){
                  $_SESSION['Usuario']=$user;
                  $_SESSION['Senha']=$password;
                  $_SESSION['Nome']=$row[0];
                  $_SESSION['Cargo']=$row[3];
                  $_SESSION['ID']=$row[4];
                header('Location:login_bridge.php');
              }
        }   
    }
        
?>