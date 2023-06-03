<?php
    session_start();
    include("../../../conection.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $query = "select * from users where email = '$email' and password = '$senha'";
    $result = $con->query($query);
    if(!$result || $result -> num_rows === 0){
        $response_error = array("msg" => "Dados invalidos", "status" => 400);
        echo json_encode($response_error);
    }
    else{
        $_SESSION['logado'] = true;
        $response_sucess = array("msg" => "Logado", "status" => 200);
        echo json_encode($response_sucess);
    }


?>