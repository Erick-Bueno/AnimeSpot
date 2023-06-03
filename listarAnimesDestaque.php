<?php 
    include("conection.php");
    $query = "select * from notices where typeContent = 'anime' and typeNotice = 'destaque' order by created_at desc limit 1 ";
    $response = array();
    $result = $con->query($query);
    if($result -> num_rows > 0){
        $response = $result -> fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode($response);
    $con -> close();
?>