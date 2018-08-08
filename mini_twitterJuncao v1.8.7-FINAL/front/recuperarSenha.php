<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloRecSenha.css">
    <script type="text/javascript" src="../js/enviarForm.js"></script>
    <title></title>
  </head>
  <body id="fundoPagina">
    <?php require_once("header.php") ?>
    <section id="areaRecuperacao">
      <label id="informativo1">Recuperar sua conta</label>
      <label id="informativo2" align="justify">
        Pelo visto esqueceu sua senha (NOME USUARIO),
        vamos resolver isso. Insira o e-mail vinculado
        a sua conta no campo abaixo, em seguida nós
        olha a sua caixa de mensagens.
      </label>

      <form action="" method="post" name="formulario_Rec">
        <input type="email" name="emailRec" placeholder="informe seu email" id="emailRec" required>
        <a href="login.php" class="fill-div" id="botao_voltar"><b> Voltar </b></a>
        <a href="javascript:enviar_formulario()" class="fill-div" id="botao_enviar"><b> Enviar </b></a>
      </form>
    </section>
  </body>
</html>
