<?php
  require_once('conexao.php');
  #$verifica = $_GET['twiiiit'];
  $query2 = "select tweet_id, user_id from likes";
  $result2 = $conn->query($query2) or die($conn->error);
  $numlikes = 0;
  while ($dados2 = $result2->fetch_array()) {
    $verifica = $dados2['tweet_id'];
    if($verifica == $id_twittiASerCurtido){
      $numlikes = $numlikes + 1;

    }
  }
  echo $numlikes ." ";
 ?>
