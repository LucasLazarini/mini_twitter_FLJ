<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloTimeLine.css">
    <script src="../js/contador.js"></script>
    <script src="../js/enviaFormMensagem.js"></script>
    <script src="../js/add_like.js"></script>
    <script src="../js/excluirPostagem.js"></script>
    <script src="../js/jquery.js"></script>
    <title></title>
  </head>
  <body id="fundo">
    <?php session_start(); ?>
      <?php require_once("headerTimeLine.php")?>
      <header id="menuLateral">
      <div id="areaFoto">
        <?php echo "<img src=".$_SESSION['foto']." id="."fotoUser".">" ?>
      </div>

      <div class="spanUser" id="spanUsername">
        <?php echo "<img src="."../imagens/hominho.png".">"." "."<span>".$_SESSION['username']."</span>" ?>
      </div>
      <div class="spanUser" id="spanNome">
        <?php echo "<img src="."../imagens/hominho.png".">"." "."<span>".$_SESSION['name']."</span>" ?>
      </div>
      <div class="spanUser" id="spanCidade">
        <?php echo "<img src="."../imagens/cidade.png".">"." "."<span>".$_SESSION['cidade']."</span>" ?>
      </div>
      <div class="spanUser" id="spanWebsite">
      <?php echo "<img src="."../imagens/website.png".">"." "."<span>".$_SESSION['website']."</span>" ?>
      </div>

      <a href="../front/alterarDados.php" id="opConta" class="botoesMenu"><p id="textConta">Conta</p></a>
      <a href="../back/logout.php" id="menuLogOut" class="botoesMenu"><p id="textLogOut">Sair</p></a>

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

            $query = "select tweets.id, date, message, username, tweets.removed from tweets inner join users on tweets.user_id = users.id order by date desc";
            $result = $conn->query($query) or die($conn->error);


            while ($dados = $result->fetch_array()) {
              $numlikes = 0;
              $id_twittiASerCurtido = $dados['id'];

              if($dados['removed'] == 0){
                echo "<div id="."cabecalhoMensagem".">";
                echo "<img src= 'mostraFotoTwitts.php' width=30 height=30>"."<label>"."    ".$dados['username']."</label>";
                echo "</div>";
                echo "<div class="."postagem".">";
                echo "<p id="."textoMensagem".">".$dados['message'] ." </p>";
                echo "</br>";
                #echo "<a href="."../back/like.php?idtwitt="."$id_twittiASerCurtido".">"."<img src="."../imagens/like.png"." alt="."LIKE"."width=20 height=20"."/>"."</a>"."<span id="."twittiCurtido_"
                #.$dados['id']."_like".">".$numlikes."</span>"." Curtiram isso !";
                echo "<button type=".'button'." name=".'button'." class=".'botaoLike'." onclick=".'add_like('.$id_twittiASerCurtido.')'.">"."<img src="."../imagens/like.png"." alt="."LIKE"."width=20 height=20"."/>";
                echo "</button>"."</br>"."</br>";
                include('../back/contalikes.php');
                echo "Curtiram isso ! ";
                if($dados['username'] == $_SESSION['username']){
                  echo "<button type=".'button'." name=".'button'." class=".'botaoLike'." onclick=".'excluirPostagem('.$id_twittiASerCurtido.')'.">"."Excluir";
                  echo "</button>";
                }
                echo "</br>";
                echo "</div>";
              }
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
