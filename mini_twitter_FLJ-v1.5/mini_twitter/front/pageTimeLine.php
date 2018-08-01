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
    <?php session_start();
     require_once("headerTimeLine.php");
    ?>
    <header id="menuLateral">
      <div id="areaFoto">
        <?php echo "<img src=".$_SESSION['foto']." id="."fotoUser".">" ?>
      </div>

      <div class="spanUser" id="spanUsername">
        <?php echo "<p>".$_SESSION['username']."</p>" ?>
      </div>
      <div class="spanUser" id="spanNome">
        <?php echo "<p>".$_SESSION['name']."</p>" ?>
      </div>
      <div class="spanUser" id="spanSeguidores">
        <?php echo "<p>".$_SESSION['cidade']."</p>" ?>
      </div>
      <div class="spanUser" id="spanSeguindo">
      <?php echo "<p>".$_SESSION['website']."</p>" ?>
      </div>

      <a href="../front/alterarDados.php" id="opConta" class="botoesMenu"><p id="textConta">Conta</p></a>
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
              echo    "<p>".$dados['username']."</p>";
              echo "</div>";

              echo "<div class="."postagem".">";
              echo    "<p id="."textoMensagem".">".$dados['message'] ." </p>";
              echo "</div>";
          }
          ?>
        </div>

      </section>
      <section id="recomendaSeguir">
        <?php
          require_once('../back/conexao.php');
          $query = "select id, username, name, city, picture from users";
          $result = $conn->query($query) or die($conn->error);

          while ($dados = $result->fetch_array()) {
            if (empty($dados['picture'])) {
              echo "<div id="."areaSeguidor".">";
              echo    "<img src="."../imagens/fotosUsers/semfoto.jpg"." id="."fotoUserSeguidor".">";
              echo "<form action="."../back/seguir.php"."name="."formSeguir"."method="."post".">";
              echo    "<p><input type="."'button'"."id="."botaoSeguidor"." value="."Seguir"."></p>";
              echo "</form>";
              echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
              echo "</div>";

            }else{

              echo "<div id="."areaSeguidor".">";
              echo    "<img src=".$dados['picture']." id="."fotoUserSeguidor".">";
              echo "<form action="."../back/seguir.php"."name="."formSeguir"."method="."post".">";
              echo    "<p><input type="."'button'"."id="."botaoSeguidor"." value="."Seguir"."></p>";
              echo "</form>";
              echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
              echo "</div>";
            }

        }
      ?>
      </section>
  </body>
</html>
