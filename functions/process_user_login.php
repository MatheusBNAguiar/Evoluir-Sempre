<?php
  function destroy_session_and_data(){
      session_start();
      $_SESSION = array();
      setcookie(session_name(), '', time() - 2592000, '/');
      session_destroy();
      header("Location:login.php");
  }
  function send_to_the_right_place($correto){
      if($correto=="pres_ger"){
        if($_SESSION['Cargo']=="super_user"){
          header('Location:super_user_main_page.php');
        }
        else if($_SESSION['Cargo']=="ger" || $_SESSION['Cargo']=="pres"){}
        else{
            header('Location:login.php');
        }
      }
      else if($_SESSION['Cargo']!=$correto){
          if($_SESSION['Cargo']=="super_user"){
            header('Location:super_user_main_page.php');
          }
          else if($_SESSION['Cargo']=="ger"){
            header('Location:main_page.php');
          }
          else if($_SESSION['Cargo']=="pres"){
              header('Location:main_page.php');
          }
          else{
              header('Location:login.php');
          }
      }
  }
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

        $query  = "SELECT * FROM cadastro_superior WHERE email_superior='$user'";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
              $salt1 = "qm&h*";
              $salt2 = "pg!@";
              $token = hash('ripemd128', "$salt1$password$salt2");
              if ($token == $row[3]){
                  $_SESSION['Usuario']=$user;
                  $_SESSION['Senha']=$token;
                  $_SESSION['Nome']=$row[1];
                  $_SESSION['Cargo']=$row[2];
                  $_SESSION['ID']=$row[0];

                  send_to_the_right_place("");
              }
        }
    }

?>
