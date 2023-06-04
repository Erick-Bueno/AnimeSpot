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

    $projectId = $firebaseConfig['lateral-rider-354218'];
    $clientEmail = $firebaseConfig['firebase-adminsdk-z24hj@lateral-rider-354218.iam.gserviceaccount.com'];
    $privateKey = $firebaseConfig['-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDE0to3nHTRrTDG\nYCEbny35Cp9/8pSS4Ru9HCkklVaqHY24AyOFzWADSvNL/cBRI/FJJpmxAk4RUmoQ\nTkTv9+NCu9/fppKfz6C0v4WHlR/NuCuTqcpBBqQn2E2HjN28BGPBviGYyquBlTAP\nzRigxoQpbkHs8HNlshfIIBYMJ9ELnXVzfKuqcvN3srD2EvCYZ6frW8UxXz1RDOfC\nqTpdZUNr/UjLzSunsjfz2Of2PqYcUxQlSDcWqTkbkAmDRZVLBSqYguDodxxIIeie\nSzLW7bdBlz4efllsCk4G5hOjzd6o5E3QvZFYl5dbcj6P2fpSSMiugNO3ZCX5pSm9\nAXB/QCfRAgMBAAECggEAAL5OSaK+9Sdbg8AVg0vg+5J/6ODodji2suV3peSDji0+\ntuNdaO3pLI44YzvgsnEgQh7W8GVr4panJogW1Mbg2mLh5q+plV8l9mVvNP261CBY\nNgAXRlz3laZPVeqfZGdmya9U1k+vwWfoDeFURPUUQEl+Dsb8c4nuSm6hpQCHmhHi\noYtsYV4tWIFVa0HwCst29vOdW/1KOo6Rb1mvXthDkpPSvoQNhZyaw879x8qQ2g5s\nUEmQzMxu/eAyCL8fvOGIgb7N/7lGFNxpBMGxwL/d5uzlCg7cd20MlZvv25uWo1fX\ndjlb1xB5B9oG3toF4xl/NUHsJse7nYCO6lDAmC72hQKBgQD3snYwmGllk2fIrvcN\nmcpA3II5fK9O4LWb2pUBexWWRxJ8UVXkxihbCrEtdJQOzCvxzi+rU/La/vKhKCZG\n14Zun4+wEqUhWkmifdgZovEYijtJjeZ2KnECGP6rRBpgU5fxO5QQv/7MkmiJpOKb\n/9yYxyfgbAMERJ+rDiReCWvaawKBgQDLa9XXK3rapQvJ5ClLPS3KdUr9ZBuJyWLm\nM1hVuuYGamZ3GlQuyZDgWSiyrNrcj+HWwnRWzSPHHtD+puSrsLlyooOmMPx58i5L\nV9VCVMSWYplWl/2EPsd/8KF3wmrJ2T0MxRXy52tZ08GZAqVjzUM1DoNrvICs0DjU\nRiamef0NswKBgFo5Z1PMMJgPWX6APP13R3TY3ZaTFEhnEb/zntMrQnG68cDW37K1\ne32uJ1unW0cIl/k8YaDGs2+R7k9FkKu9Vfp1pKE+KWg8uxW1QUIVWDzYHUBtr8Tb\nMM7Sy/EWnYT47h+w0/5F8UoTCoEYznKEgJYl9SCKN48WcBKe1CBszhyBAoGAR0jU\nuQBdnv0zcl5oMhuQTmBoFP/dvp058R2RGQnTze+/VIF/ep3cDSJxZpu4Xo51P8MI\n7doZbY/ZAUQO4jOd6RQWOkj0UO+TVYfEDeiSs3h976B3kL5HPwheLQ+OSIm+IRl3\npZV/Qw03zJzmxGCL6q3ZVAnMtcKKB6lFphUdno0CgYACV8PY02zlm8uniDfW1QXQ\nIOfDhm+Ml3YGc+QEx4t2KWkOvLyL6pFWfb14DZfZyztNMjOJdiIQxT78A0PNepTv\n4FnVx+UVnCftgzNjRcE7iThA8LEVZ0l/uNWFBeFkJm1LOaIkTtPierctlaUBG2Li\nfyau9SyOcGeXvyTvbFZs6Q==\n-----END PRIVATE KEY-----\n'];

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