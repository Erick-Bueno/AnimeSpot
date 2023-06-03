<?php
    include("../../../conection.php");
    $id = $_GET['id'];
    $query = "Delete from notices where id = $id";
    $con -> query($query);
    $con -> close();
?>