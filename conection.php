<?php

    $HOST = "containers-us-west-19.railway.app";
    $PASSWORD = "TiGAZY5drDuBKaF2Zbwh";
    $USER = "root";
    $DATABASE = "railway";
    $PORT = 6996;

    $con= new mysqli($HOST, $USER, $PASSWORD, $DATABASE,$PORT);

    if($con -> connect_errno){
        echo"erro";
        return;
    }
  

?>