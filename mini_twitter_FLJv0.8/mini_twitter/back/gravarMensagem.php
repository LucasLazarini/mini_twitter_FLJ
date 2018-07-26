<?php
  require_once('conexao.php');
  session_start();
  $data;
  $mensagem = $_POST["mensagem"];

$stmt = $conn->prepare("INSERT INTO tweets (date, message, user_id) VALUES (?,?,?)");
$stmt->bind_param("sss", $data, $mensagem, $_SESSION['id']);
if($stmt->execute()){
  header("Location: ../front/pageTimeLine.php");
}else{
    echo "Erro!";
}

?>
