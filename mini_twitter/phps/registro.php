<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../estilos_CSS/estiloRegistro.css">
    <script>
      function enviar_formulario(){
        document.formulario.submit();
      }
    </script>

    <title></title>
  </head>
  <body>
    <div id="fundoPagina">
      <div id="areaReg">
        <h2 id="tituloReg"> Preencha o formulário: </h2>
        <form action="gravarNovoUser.php" method="post" name="formulario">
          <textarea  name="Nome" placeholder="Nome completo" id="areaNome" ></textarea>
          <textarea  name="Username" placeholder="Nome de usuario" id="areaUsername" ></textarea>
          <input name="Senha" autocomplete="off" type="password" placeholder="Senha" id="areaSenha"/>
          <input name="Confirmacao" autocomplete="off" type="password" placeholder="Confirme sua senha" id="areaConfirmacao"/>
          <input name="Email" type="email" placeholder="Endereço de Email" id="areaEmail"/>
          <input name="dataNasc" autocomplete="off" type="date" id="dtnasc"/>
          <select  name="genero" id="genero">
            <option>Gênero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Não informado">Não informado</option>
          </select>
          <textarea name="cidade" placeholder="Cidade" id="cidade"></textarea>
          <textarea name="website" placeholder="WebSite" id="website"></textarea>
        </form>
        <a href="javascript:enviar_formulario()" class="fill-div"><b> Cadastrar </b></a>
      </div>
    </div>
  </body>
</html>
