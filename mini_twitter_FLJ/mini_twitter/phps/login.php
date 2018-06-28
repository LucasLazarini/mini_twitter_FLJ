<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloLogin.css">
    <script>
      function enviar_formularioLogin(){
        document.formularioLogin.submit();
      }
    </script>
    <title></title>
  </head>
  <body>
    <div id="fundoPagina"><div>
    <form class="" action="processoLogin.php" method="post" name="formularioLogin">
      <div id="areaLogin">
        <h2 id="tituloLogin"> Entrar </h2>
        <textarea name="username" rows="1" cols="51" placeholder="Nome de Usuário ou Email" id="areaUsername"></textarea>
        <textarea name="senha" rows="1" cols="51" placeholder="Senha" id="areaSenha"></textarea>
        <div id="botaoLogin">
          <a href="javascript:enviar_formularioLogin()" class="fill-div"><b> Login </b></a>
        </div>
        <div class="areaCheck">
          <input type="checkbox" value="None" id="squaredThree" name="check" />
          <label  for="areaCheck"> Lembre-se de mim</label>
        </div>
        <a href="recuperarSenha.php" id="esqueceuSenha"> Esqueceu sua senha? </a>
      </div>
    </form>
  </body>
</html>
