<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloTimeLine.css">
    <script src="../js/contador.js"></script>
    <title></title>
  </head>
  <body>
    <?php session_start(); ?>
    <container id="fundo">
      <header id="menuLateral">
        <div id="areaFoto">
          <img src="../imagens/pic02.jpg" id="fotoUser">
        </div>
        <div id="menuInicio" class="menu">
        </div>
        <div id="menuLogOut" class="menu">
        </div>
      </header>
      <section id="timeLine">
        <section id="areaMensagem">
          <form action="../back/gravarMensagem.php" method="post">
            <textarea rows="5" cols="10" placeholder="No que está pensando?" maxlength="140" onclick="caracteres()" onblur="caracteres()"
            onkeyup="caracteres()" onkeydown="caracteres()" id="mensagem" name="mensagem"></textarea>

            <div id="botaoTweetar"></div>

            <input type="submit" value="Tweetar" id="tweetar"/>

            <div id="restante"></div>
        </form>
        </section>
      </section>
    </container>

  </body>
</html>
