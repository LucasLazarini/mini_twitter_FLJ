<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloTimeLine.css">
    <script src="../js/contador.js"></script>
    <script src="../js/enviaFormMensagem.js"></script>
    <title></title>
  </head>
  <body id="fundo">
    <?php session_start(); ?>
      <?php require_once("headerTimeLine.php")?>
      <header id="menuLateral">
        <div id="areaFoto">
          <img src="../imagens/pic02.jpg" id="fotoUser">
        </div>
        <div id="menuInicio" class="botoesMenu">
        </div>
        <div id="menuLogOut" class="botoesMenu">
        </div>
      </header>
      <section id="timeLine">
        <section id="areaMensagem">
          <form action="../back/gravarMensagem.php" method="post" name="formularioMensagem">

            <textarea rows="3" placeholder="No que está pensando?" maxlength="140" onclick="caracteres()" onblur="caracteres()"
            onkeyup="caracteres()" onkeydown="caracteres()" id="mensagem" name="mensagem"></textarea>
            <a href="javascript:enviar_formularioMensagem()" class="fill-div" id="botaoTwitt"><b>Publicar</b></a>

          </form>
          <div id="restante"></div>
        </section>
        <div id="areaPostagem">
        <?php
        require_once('../back/conexao.php');
          $query = "select id, date, message, user_id, removed from tweets order by date desc";
          $result = $conn->query($query) or die($conn->error);
          $dados = $result->fetch_array();

          $query2 = "select username from users where id = '$dados['user_id']'";
          $result2 = $conn2->query($query2) or die($conn->error);
          $dados2 = $result2->fetch_array();

          while ($dados = $result->fetch_array()) {
            echo "<div id="."cabecalhoMensagem".">";
            echo "<p>".$result2['user_id']."</p>";
            echo "<div class="."postagem".">";
            echo "<p id="."textoMensagem".">".$dados['message'] ." </p>";
            echo "</div>";
          }
          ?>
        </div>

      </section>


  </body>
</html>
