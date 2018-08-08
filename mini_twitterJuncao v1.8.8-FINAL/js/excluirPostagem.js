function excluirPostagem(idTweet) {
  var ajax = new XMLHttpRequest();
  var id = "id="+idTweet;
  console.log(id);
  // Seta tipo de requisição: Post e a URL da API
  ajax.open("POST", "../back/excluirPostagem.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Seta paramêtros da requisição e envia a requisição
  //  ajax.send(id);
  window.location.href = "../back/excluirPostagem.php?" + id;


}
