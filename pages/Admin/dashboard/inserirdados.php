<?php

use Google\Cloud\Storage\StorageClient;

    include("../../../conection.php");
    require "../../../vendor/autoload.php";
    use Firebase\JWT\JWT;
   
  
    
    $nome_arquivo =   uniqid()."_".$_FILES['imagemNoticia']['name'] ;
    $arquivo_tmp = $_FILES['imagemNoticia']['tmp_name'];
    $titulo_noticia = $_POST['titulo'];
    $descricao_noticia = $_POST['descricao'];
    $tipo_conteudo = $_POST['typeContent'];
    $tipo_noticia = $_POST['typeNotice'];
    $conteudo = $_POST['conteudo'];

    $projectId = $firebaseConfig['project_id'];
    $clientEmail = $firebaseConfig['client_email'];
    $privateKey = $firebaseConfig['private_key'];

    // Cria um token JWT
    $jwtPayload = [
        'iss' => "erick",
        'sub' => "erick",
        'aud' => 'https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit',
        'iat' => time(),
        'exp' => time() + 3600,
        'uid' => 'firebase-admin',
    ];
    $jwt = JWT::encode($jwtPayload, $privateKey, 'RS256');

    // Configura o cliente do Firebase Storage
    $storage = new StorageClient([
        'projectId' => $projectId,
        'authCache' => false,
        'authHttpHandler' => function ($httpHandler) use ($jwt) {
            return function ($request, $options = []) use ($httpHandler, $jwt) {
                $request = $request->withHeader('Authorization', 'Bearer ' . $jwt);
                return $httpHandler($request, $options);
            };
        },
    ]);

    // Realiza o upload do arquivo para o Firebase Storage
    $bucket = $storage->bucket($storageBucket);
    $uploadedFile = $bucket->upload(fopen($arquivo_tmp, 'r'), [
        'name' => $nome_arquivo
    ]);


  /*   $query = "";
   
    $query = "INSERT INTO notices (title, img_url, simpleDescription, typeContent, typeNotice, content, created_at) values ('$titulo_noticia','$acesso_img','$descricao_noticia','$tipo_conteudo','$tipo_noticia', '$conteudo', NOW() )";
       
    
    $response = array();
    if($con->query($query)){
        $response['message'] = "Noticia Adicionada";
    }
    echo json_encode($response); 
    $con->close(); */
?>