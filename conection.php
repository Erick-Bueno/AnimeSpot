<?php

    $HOST = "localhost";
    $PASSWORD = "";
    $USER = "root";
    $DATABASE = "animespot";

    $con= new mysqli($HOST, $USER, $PASSWORD, $DATABASE);

    if($con -> connect_errno){
        echo"erro";
        return;
    }
  

?>