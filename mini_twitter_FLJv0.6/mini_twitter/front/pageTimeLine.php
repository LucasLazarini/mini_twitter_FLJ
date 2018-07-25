<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloTimeLine.css">
    <script src="../js/contador.js"></script>
    <script src="../js/enviarForm.js"></script>
    <title></title>
  </head>
  <body id="fundo">
    <?php session_start(); ?>
      <?php require_once("headerTimeLine.php")?>
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
            <textarea rows="3" placeholder="No que está pensando?" maxlength="140" onclick="caracteres()" onblur="caracteres()"
            onkeyup="caracteres()" onkeydown="caracteres()" id="mensagem" name="mensagem"></textarea>

            <a href="javascript:enviar_formularioLogin()" class="fill-div" id="botaoTwitt"><b>Publicar</b></a>

            <div id="restante"></div>
        </form>
        </section>
      </section>


  </body>
</html>
