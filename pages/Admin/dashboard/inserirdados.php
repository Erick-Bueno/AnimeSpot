<?php
    include("../../../conection.php");
    $nome_arquivo =   uniqid()."_".$_FILES['imagemNoticia']['name'] ;
    $arquivo_tmp = $_FILES['imagemNoticia']['tmp_name'];
    $titulo_noticia = $_POST['titulo'];
    $descricao_noticia = $_POST['descricao'];
    $tipo_conteudo = $_POST['typeContent'];
    $tipo_noticia = $_POST['typeNotice'];
    $conteudo = $_POST['conteudo'];
    $acesso_img = "http://localhost/AnimeSpot/imagemNoticias/" . $nome_arquivo;
    $diretorio = "C:/xampp/htdocs/AnimeSpot/imagemNoticias/";
    $caminho = $diretorio . $nome_arquivo;
    $query = "";
    if(move_uploaded_file($arquivo_tmp,$caminho)){
        $query = "INSERT INTO notices (title, img_url, simpleDescription, typeContent, typeNotice, content, created_at) values ('$titulo_noticia','$acesso_img','$descricao_noticia','$tipo_conteudo','$tipo_noticia', '$conteudo', NOW() )";
       
    }
    $response = array();
    if($con->query($query)){
        $response['message'] = "Noticia Adicionada";
    }
    echo json_encode($response);
    $con->close();
    
?>