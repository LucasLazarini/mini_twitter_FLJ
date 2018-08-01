<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../estilos_CSS/estiloAlterarDados.css">
    <script src="../js/enviarForm.js"></script>
    <script src="../js/alterarDados.js"></script>
    <title></title>
  </head>
  <body id="fundoPagina">
      <?php require_once("header.php");
      session_start();
      ?>
      <section id="areaReg">

        <span id="tituloReg"> Altere seus dados: </span>

        <form action="../back/alterarNome.php" method="post" name="formularioAlteraNome">
          <input class="inputReg" name="Nome" placeholder="Altere seu nome" id="areaNome" required>
          <a href="javascript:enviar_formAlteraNome()" class="botaoEnvioAlterar" id="areaNome">Alterar</a>
        </form>
        <form action="../back/alterarSenha.php" method="post" name="formularioAlterarSenha">
          <input name="Senha" type="password" placeholder="Altere sua senha" id="areaSenha" required>
          <input name="Confirmacao" type="password" placeholder="Confirme sua nova senha" id="areaConfirmacao"required>
          <a href="javascript:enviar_formAlterarSenha()" class="botaoEnvioAlterar" id="alterarSenha">Alterar</a>
        </form>
        <form action="../back/alterarEmail.php" method="post" name="formularioDados">
          <input class="inputReg" name="Email" type="email" placeholder="Altere seu email" id="areaEmail">
          <a href="javascript:enviar_formularioLogin()" class="botaoEnvioAlterar" id="areaEmail">Alterar</a>
        </form>
        <form action="../back/alterarCidade.php" method="post" name="formularioAlterarCidade">
          <input class="inputReg" type="text" name="cidade" placeholder="Cidade" id="cidade" required>
          <a href="javascript:enviar_formAlterarCidade()" class="botaoEnvioAlterar" id="cidade">Alterar</a>
        </form>
        <form action="../back/alterarWebsite.php" method="post" name="formularioAlterarWebsite">
          <input class="inputReg" type="text" name="website" placeholder="Altere seu website" id="website">
          <a href="javascript:enviar_formAlterarWebsite()" class="botaoEnvioAlterar" id="website">Alterar</a>
        </form>
        <form action="../back/alteraFoto.php" method="post" name="formularioFoto" enctype="multipart/form-data">
          <input class="inputReg" type="file" name="uploadFoto" id="uploadFoto">
          <a href="javascript:enviar_formFoto()" class="botaoEnvioAlterar" id="uploadFoto">Alterar</a>
        </form>

        <a href="pageTimeLine.php" id="voltarTimeLine">Voltar</a>

      </section>
  </body>
</html>
