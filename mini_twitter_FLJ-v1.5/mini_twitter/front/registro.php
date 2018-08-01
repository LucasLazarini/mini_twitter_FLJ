<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../estilos_CSS/estiloRegistro.css">
    <script src="../js/enviarForm.js"></script>
    <title></title>
  </head>
  <body id="fundoPagina">
      <?php require_once("header.php");
      session_start();
      ?>
      <section id="areaReg">

        <span id="tituloReg"> Preencha o formulário: </span>

        <form action="../back/gravarNovoUser.php" method="post" name="formularioLogin">
          <input name="Nome" placeholder="Nome completo" id="areaNome" required>
          <input name="Username" placeholder="Nome de usuario" id="areaUsername" required>
          <input name="Senha" type="password" placeholder="Senha" id="areaSenha" required>
          <input name="Confirmacao" type="password" placeholder="Confirme sua senha" id="areaConfirmacao"required>
          <input name="Email" type="email" placeholder="Endereço de Email" id="areaEmail">
          <input name="dataNasc" type="date" id="dtnasc" required>
          <select  name="genero" id="genero" required>
            <option>Gênero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Não informado">Não informado</option>
          </select>
          <input type="text" name="cidade" placeholder="Cidade" id="cidade" required>
          <input type="text" name="website" placeholder="WebSite" id="website">

          <a href="javascript:enviar_formularioLogin()" class="fill-div"><b> Cadastrar </b></a>

        </form>
      </section>
  </body>
</html>
