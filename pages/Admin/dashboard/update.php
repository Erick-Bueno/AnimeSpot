<?php
     include("../../../conection.php");
     $titulo_noticia = $_POST['titulo'];
     $descricao_noticia = $_POST['descricao'];
     $tipo_conteudo = $_POST['typeContent'];
     $tipo_noticia = $_POST['typeNotice'];
     $conteudo = $_POST['conteudo'];
     $id_notice = $_GET['id'];
     $imgurl = $_GET['imgurl'];
     echo $imgurl;
     $query = "";
     if($imgurl){
        $query = "update notices set title = '$titulo_noticia', img_url = '$imgurl', simpleDescription = '$descricao_noticia', typeContent = '$tipo_conteudo', typeNotice = '$tipo_noticia', content = '$conteudo' where id = $id_notice ";
        $con->query($query);
        $con->close();
        $response_sucess = array("msg" => "Noticia atualizada com sucesso");
        echo json_encode($response_sucess);

     }
     else{
        $query = "update notices set title = '$titulo_noticia', simpleDescription = '$descricao_noticia', typeContent = '$tipo_conteudo', typeNotice = '$tipo_noticia', content = '$conteudo'  where id = $id_notice ";
        $con->query($query);
        $con->close();
        $response_sucess = array("msg" => "Noticia atualizada com sucesso");
        echo json_encode($response_sucess);
        
     }
   
?>