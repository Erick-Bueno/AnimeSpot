<?php
    include("../conection.php");
    $id_notice = $_GET['id'];
    $query = "select * from notices where id = $id_notice";
    $result = $con -> query($query);
    $response = $result -> fetch_assoc();
    echo json_encode($response);
    $con -> close();
?>