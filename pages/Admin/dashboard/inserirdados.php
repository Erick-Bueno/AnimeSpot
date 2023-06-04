<?php
    include("../../../conection.php");
    require 'C:\Users\erick\Documents\GitHub\AnimeSpot\vendor\autoload.php';
    
   

use Google\Cloud\Storage\StorageClient;
use Kreait\Firebase\Contract\Storage;
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

   
  
    
    $nome_arquivo =   uniqid()."_".$_FILES['imagemNoticia']['name'] ;
    $arquivo_tmp = $_FILES['imagemNoticia']['tmp_name'];
    $titulo_noticia = $_POST['titulo'];
    $descricao_noticia = $_POST['descricao'];
    $tipo_conteudo = $_POST['typeContent'];
    $tipo_noticia = $_POST['typeNotice'];
    $conteudo = $_POST['conteudo'];

    $storage = new StorageClient(['projectId' => 'lateral-rider-354218', 'keyFilePath' => 'lateral-rider-354218-firebase-adminsdk-z24hj-45ea6eaa9b.json']);
    $bucket = $storage -> bucket("/");
    $bucket -> upload(file_get_contents($arquivo_tmp),
    [
        'name' => $nome_arquivo 
    ]);
    $query = "";
   
/*     $query = "INSERT INTO notices (title, img_url, simpleDescription, typeContent, typeNotice, content, created_at) values ('$titulo_noticia','$acesso_img','$descricao_noticia','$tipo_conteudo','$tipo_noticia', '$conteudo', NOW() )";
       
    
    $response = array();
    if($con->query($query)){
        $response['message'] = "Noticia Adicionada";
    }
    echo json_encode($response); */
    $con->close();
?>