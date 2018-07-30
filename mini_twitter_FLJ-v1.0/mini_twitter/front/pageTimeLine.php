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
          <a href=""><img src="../imagens/pic02.jpg" id="fotoUser"></a>
        </div>
        <a href="" class="botoesMenu" id="menuInicio"><p id="textConta">Conta</p></a>

        <a href="" id="menuLogOut" class="botoesMenu"><p id="textLogOut">Sair</p></a>

      </header>
      <section id="timeLine">
        <section id="areaMensagem">
          <form action="../back/gravarMensagem.php" method="post" name="formularioMensagem">

            <textarea rows="3" placeholder="No que está pensando?" maxlength="140" onclick="caracteres()" onblur="caracteres()"
            onkeyup="caracteres()" onkeydown="caracteres()" id="mensagem" name="mensagem"></textarea>
            <a href="javascript:enviar_formularioMensagem()" id="botaoTwitt"><b>Publicar</b></a>

          </form>
          <div id="restante"></div>
        </section>
        <div id="areaPostagem">
        <?php
        require_once('../back/conexao.php');
          $query = "select date, message, username from tweets inner join users on tweets.user_id = users.id order by date desc";
          $result = $conn->query($query) or die($conn->error);

          while ($dados = $result->fetch_array()) {

            echo "<div id="."cabecalhoMensagem".">";
            echo "<p>".$dados['username']."</p>";
            echo "<div class="."postagem".">";
            echo "<p id="."textoMensagem".">".$dados['message'] ." </p>";
            echo "</div>";
          }
          ?>
        </div>

      </section>


  </body>
</html>
