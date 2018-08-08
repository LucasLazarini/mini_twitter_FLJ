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
    <?php
      session_start();
      require_once("headerTimeLine.php")
    ?>
    <header id="menuLateral">
      <div id="areaFoto">
        <?php
          if (empty($_SESSION['foto'])) {
            echo "<img src="."../imagens/user.png"." id="."fotoUser".">";
          }else{
            echo "<img src=".$_SESSION['foto']." id="."fotoUser".">";
          }
        ?>
      </div>

      <div class="spanUser" id="spanUsername">
        <?php echo "<img src="."../imagens/hominho.png".">"."<span>"." ".$_SESSION['username']."</span>" ?>
      </div>
      <div class="spanUser" id="spanNome">
        <?php echo "<img src="."../imagens/hominho.png".">"."<span>"." ".$_SESSION['name']."</span>" ?>
      </div>
      <div class="spanUser" id="spanCidade">
        <?php echo "<img src="."../imagens/cidade.png".">"."<span>"." ".$_SESSION['cidade']."</span>" ?>
      </div>
      <div class="spanUser" id="spanWebsite">
        <?php echo "<img src="."../imagens/website.png".">"."<span>"." ".$_SESSION['website']."</span>" ?>
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
          $arrayPostSeguidores = array();
          $cont = 0;
          $idSessao = $_SESSION['id'];
          $query = "select follower_id from followers where user_id = $idSessao";
          $result3 = $conn->query($query) or die($conn->error);

          while ($dados3 = $result3->fetch_array()) {
            $arrayPostSeguidores[$cont] = $dados3['follower_id'];
            $cont++;
          }

         $query = "select tweets.id, date, message, username, picture, tweets.removed, user_id from tweets inner join users on tweets.user_id = users.id order by date desc";
         $result = $conn->query($query) or die($conn->error);

         while ($dados = $result->fetch_array()) {
           $numlikes = 0;
           $id_twittiASerCurtido = $dados['id'];
           $caminhoImagem = "../imagens/user.png";
           $idUser = $dados['user_id'];

           if ($idSessao == $dados['user_id']) {
             if(!empty($dados['picture'])){
                $caminhoImagem = $dados['picture'];
             }
             if($dados['removed'] == 0){
               echo "<div id="."cabecalhoMensagem1".">";
               echo    "<img src=". $caminhoImagem." width=30 height=30 id="."fotoPost".">"."<span id="."usernamePost".">".$dados['username']."</span>";
               echo "</div>";

               echo "<div class="."postagem".">";
               echo    "<p id="."textoMensagem".">".$dados['message'] ." </p>";
               echo "</br>";

               echo "<div id="."rodapeMensagem".">";
               echo    "<button type=".'button'." name=".'button'." id=".'botaoLike'." onclick=".'add_like('.$id_twittiASerCurtido.')'.">"."<img src="."../imagens/iconelike.jpg"." alt="."LIKE"."width=20 height=20"."/>";
               echo    "</button>";
               include('../back/contalikes.php');
               echo    "Curtiram!";
               if($dados['username'] == $_SESSION['username']){
                 echo    "<button type=".'button'." name=".'button'." id="."botaoExluir"." onclick=".'excluirPostagem('.$id_twittiASerCurtido.')'.">"."<img src="."../imagens/iconedeslike.svg"." alt="."DESLIKE"."width=20 height=20"."/>";
                 echo    "</button>";
               }
               echo "</div>";
               echo "</br>";
               echo "</div>";
             }
           }

           for ($i=0; $i < $cont; $i++) {
             if ($idUser==$arrayPostSeguidores[$i]) {
               if(!empty($dados['picture'])){
                  $caminhoImagem = $dados['picture'];
               }
               if($dados['removed'] == 0){
                 echo "<div id="."cabecalhoMensagem1".">";
                 echo    "<img src=". $caminhoImagem." width=30 height=30 id="."fotoPost".">"."<span id="."usernamePost".">".$dados['username']."</span>";
                 echo "</div>";

                 echo "<div class="."postagem".">";
                 echo    "<p id="."textoMensagem".">".$dados['message'] ." </p>";
                 echo "</br>";

                 echo "<div id="."rodapeMensagem".">";
                 echo    "<button type=".'button'." name=".'button'." id=".'botaoLike'." onclick=".'add_like('.$id_twittiASerCurtido.')'.">"."<img src="."../imagens/iconelike.jpg"." alt="."LIKE"."width=20 height=20"."/>";
                 echo    "</button>";
                 include('../back/contalikes.php');
                 echo    "Curtiram!";
                 if($dados['username'] == $_SESSION['username']){
                   echo    "<button type=".'button'." name=".'button'." id="."botaoExluir"." onclick=".'excluirPostagem('.$id_twittiASerCurtido.')'.">"."<img src="."../imagens/iconedeslike.svg"." alt="."DESLIKE"."width=20 height=20"."/>";
                   echo    "</button>";
                 }
                 echo "</div>";
                 echo "</br>";
                 echo "</div>";
               }
             }
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
         $idSessao = $_SESSION['id'];
         $query2 = "select id, follower_id from followers where user_id = $idSessao";
         $result2 = $conn->query($query2) or die($conn->error);
         $contador = 0;
         $contador2 = 0;
         $arraySeguidores = array();
         $arrayIdsTwitts = array();

         while ($dados2 = $result2->fetch_array()) {
           $arraySeguidores[$contador] = $dados2['follower_id'];
           $arrayIdsTwitts[$contador] = $dados2['id'];
           $contador++;
         }


         while ($dados = $result->fetch_array()) {
           if ($dados['id']!=$idSessao) {
             // code...

           $seguiOunao = -1;
           $linhadoTwitt = 0;
           for ($i=0; $i < $contador; $i++) {
             if($dados['id']==$arraySeguidores[$i]){
                $seguiOunao = 1;
                $linhadoTwitt = $i;
             }
           }
            if (empty($dados['picture'])){
               if ($seguiOunao==-1) {
                 echo "<div id="."areaSeguidor".">";
                 echo    "<img src="."../imagens/user.png"." id="."fotoUserSeguidor".">";
                 echo "<form action="."../back/seguir.php"." name="."formSeguir"." method="."post".">";
                 echo    "<input type="."hidden"." name="."teste"." value=".$dados['id'].">";
                 echo    "<p><input type="."'submit'"."id="."botaoSeguidor"." value="."Seguir"."></p>";
                 echo "</form>";
                 echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
                 echo "</div>";
               }else{
                 echo "<div id="."areaSeguidor".">";
                 echo    "<img src="."../imagens/user.png"." id="."fotoUserSeguidor".">";
                 echo "<form action="."../back/deixarSeguir.php"." name="."formSeguir"." method="."post".">";
                 echo    "<input type="."hidden"." name="."idTwitt"." value=".$arrayIdsTwitts[$linhadoTwitt].">";
                 echo    "<p><input type="."'submit'"."id="."botaoSeguidor"." value="."Deixar"."></p>";
                 echo "</form>";
                 echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
                 echo "</div>";
               }
             }else{
               if ($seguiOunao==-1) {
                 echo "<div id="."areaSeguidor".">";
                 echo    "<img src=".$dados['picture']." id="."fotoUserSeguidor".">";
                 echo "<form action="."../back/seguir.php"." name="."formSeguir"." method="."post".">";
                 echo    "<input type="."hidden"." name="."teste"." value=".$dados['id'].">";
                 echo    "<p><input type="."'submit'"."id="."botaoSeguidor"." value="."Seguir"."></p>";
                 echo "</form>";
                 echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
                 echo "</div>";
               }else{
                 echo "<div id="."areaSeguidor".">";
                 echo    "<img src=".$dados['picture']." id="."fotoUserSeguidor".">";
                 echo "<form action="."../back/deixarSeguir.php"." name="."formSeguir"." method="."post".">";
                 echo    "<input type="."hidden"." name="."idTwitt"." value=".$arrayIdsTwitts[$linhadoTwitt].">";
                 echo    "<p><input type="."'submit'"."id="."botaoSeguidor"." value="."Deixar"."></p>";
                 echo "</form>";
                 echo    "<p id="."usernameSeguidor".">".$dados['username'] ." </p>";
                 echo "</div>";
               }
             }
           }
          }

      ?>
      </section>


  </body>
</html>
