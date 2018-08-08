<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloLogin.css">
    <script type="text/javascript" src="../js/enviarForm.js"></script>
    <title></title>
  </head>
  <body id="fundoPagina">
    <<?php require_once("header.php") ?>
    <section id="areaLogin">
      <label id="tituloLogin">Entrar</label>
      <?php
        if(isset($_COOKIE['username'])){
          require_once("../back/loginCookie.php");
        }
      ?>
            <form action="../back/processoLogin.php" method="post" name="formularioLogin">
            <input name="username"  placeholder="Nome de Usuário ou Email" id="areaUsername" required>
            <input type="password" name="senha" placeholder="Senha" id="areaSenha" required>
            <div id="checkLembrar">
              <input type="checkbox" value="lembrar" id="caixinhaSelecao" name="caixinha" />
              <label>Lembre-se de mim</label>
            </div>
            <a href="javascript:enviar_formularioLogin()" class="fill-div1" id="botaoLogin"><b>Login</b></a>
            <a href="recuperarSenha.php" class="fill-div2" id="botaoEsqSenha"><b>Esqueceu sua senha?</b></a>
      </form>
    </section>
  </body>
</html>
