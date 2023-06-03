<?php
     include("../../../conection.php");
     $titulo_noticia = $_POST['titulo'];
     $descricao_noticia = $_POST['descricao'];
     $tipo_conteudo = $_POST['typeContent'];
     $tipo_noticia = $_POST['typeNotice'];
     $conteudo = $_POST['conteudo'];
     $id_notice = $_GET['id'];
  
     $query = "";
     if($_FILES['imagemNoticia']['name']){
        $nome_arquivo =   uniqid()."_".$_FILES['imagemNoticia']['name'] ;
        $arquivo_tmp = $_FILES['imagemNoticia']['tmp_name'];
        $acesso_img = "http://localhost/AnimeSpot/imagemNoticias/" . $nome_arquivo;
        $diretorio = "C:/xampp/htdocs/AnimeSpot/imagemNoticias/";
        $caminho = $diretorio . $nome_arquivo;
        $query = "update notices set title = '$titulo_noticia', img_url = '$acesso_img', simpleDescription = '$descricao_noticia', typeContent = '$tipo_conteudo', typeNotice = '$tipo_noticia', content = '$conteudo' where id = $id_notice ";
        move_uploaded_file($arquivo_tmp,$caminho);
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