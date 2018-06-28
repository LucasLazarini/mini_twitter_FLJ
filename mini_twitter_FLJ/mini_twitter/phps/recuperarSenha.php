<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloRecSenha.css">
    <script>
      function voltar_login(){
        document.formulario_Rec.submit();
      }
    </script>
    <title></title>
  </head>
  <body>
    <div id="fundoPagina">
      <div id="areaRecuperacao">
        <p id="informativo1">Recuperar sua conta</p>
        <p id="informativo2" align="justify">
          Podemos ajudá-lo a redefinir sua senha e informações<br>
          de segurança. Primeiro, insira sua conta da Microsoft<br>
          e siga as instruções a seguir.</p>
        <h1 id="faixa"> ________________________ </h1>
        <form action="" method="post" name="formulario_Rec">
          <textarea name="emailRec" placeholder="informe seu email" id="emailRec"></textarea>
          <a href="login.php" class="fill-div" id="botao_voltar"><b> Voltar </b></a>
          <a href="javascript:enviar_formulario()" class="fill-div" id="botao_enviar"><b> Enviar </b></a>
        </form>
      </div>
    </div>
  </body>
</html>
