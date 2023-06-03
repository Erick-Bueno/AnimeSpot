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
    <link rel="stylesheet" href="novaNoticia.css">
    <script src="./todasAsNoticias.js" defer></script>
    <script src="./NovaNoticia.js" defer></script>
  </head>
  <body>
    <section class="conteudo-dash">
      <section class="menu">
        <h1 class="title-dashboard">Dashboard</h1>
        <nav class="nav">
          <a class="back" href="./TodasAsNoticias.php">Todas as notícias</a>
          <a class="back" href="./novaNoticia.php">Nova notícia</a>
        </nav>
        <a href="../../../index.html">
          <div class="go-home">
            <img class="home-icon" src="../../../images/home.png" alt="" />
            <p class="p-goToHome">Ir para o site</p>
          </div>
        </a>
      </section>
      <section class="background-table">
        <div class="table2">
          <section class="form">
            <h1 class="title-newNotice">Nova notícia</h1>
            <form>
                <div>
                    <h1 class="titles-form">Imagem</h1>
                    <label class="img-label" for="img">UPLOAD</label>
                    <input name="imagemNoticia"  class="file" id="img" type="file">
                </div>
                <div class="container-input-form">
                    <label class="titles-form" for="title">Titulo</label>
                    <input name="titulo" class="input-title inputText" id="title" type="text">
                </div>
                <div class="container-input-form">
                    <label class="titles-form" for="desc">Descrição</label>
                    <input name="descricao" class="inputText input-description" id="desc" type="text">
                </div>
                <div>
                    <h1 class="titles-form">Categorias</h1>
                     <select class="select" name="typeContent" id="">
                        <option class="select" value="anime">Animes</option>
                        <option value="manga">Mangás</option>
                     </select>
                     <select class="select" name="typeNotice" id="">
                        <option value="destaque">Destaques</option>
                        <option value="comum">Noticia comum</option>
                     </select>
                </div>
                <div>
                    <h1 class="titles-form">Conteúdo</h1>
                    <textarea name="conteudo" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="container-buttons"><button class="save">Salvar</button> <button class="desca">Descartar</button></div>
            </form>
          </section>
          <section class="pre-view">
            <h1 class="pre">Pré visualização</h1>
            <div class="card-notices">
                <div class="container-cardimg">
                  <img class="cardimg preview-img" src="" alt="" />
                </div>
                <div>
                  <p class="notice-title">
                    Titulo
                  </p>
                  <p class="date datenow"></p>
                  <p class="description">
                   Descrição
                  </p>
                </div>
              </div>
          </section>
        </div>
      </section>
    </section>
  </body>
</html>
