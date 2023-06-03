<?php
  include("../../../verificar_autenticacao.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../../dashboard.css" />
    <link rel="stylesheet" href="todasAsNoticas.css">
    <script src="todasAsNoticias.js" defer></script>
  </head>
  <body>
    <section class="conteudo-dash">
      <section class="menu">
        <h1 class="title-dashboard">Dashboard</h1>
        <nav class="nav">
          <a class="back" href="./TodasAsNoticias.php">Todas as notícias</a>
          <a class="back" href="./novaNoticia.php">Nova notícia</a>
        </nav>
        <a href="../../../index.php">
          <div class="go-home">
            <img class="home-icon" src="../../../images/home.png" alt="" />
            <p class="p-goToHome">Ir para o site</p>
          </div>
        </a>
      </section>
      <section class="background-table">
        <div class="table">
          <h1 class="title-notices">Todas as notícias</h1>
          <table>
            <tr>
              <th>Id</th>
              <th>Título</th>
              <th>Descrição</th>
              <th></th>
            </tr>          
          </table>
        </div>
      </section>
    </section>
  </body>
</html>
