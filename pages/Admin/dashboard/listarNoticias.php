<?php
    include("../../../conection.php");
    $query = "select * from notices";
    $response = array();
    $result = $con -> query($query);
    if($result-> num_rows > 0){
        $response = $result -> fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode($response);

    $con->close();
?>