<?php 
    function destroy_session_and_data(){
        session_start();
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
        header("Location:login.php");
    }
    function send_to_the_right_place($correto){
        if($_SESSION['Cargo']!=$correto){
            if($_SESSION['Cargo']=="super_user"){
              header('Location:super_user_main_page.php');  
            }
            else if($_SESSION['Cargo']=="ger"){
              header('Location:manager_main_page.php');
            }
            else if($_SESSION['Cargo']=="pres"){
                header('Location:pres_main_page.php');
            }
            else{
                header('Location:login.php');
            }
        }
    }



?>