<?php
  require_once('conexao.php');
$data;
$mensagem = $_POST["mensagemUser"];
$userID;



$stmt = $conn->prepare("INSERT INTO tweets (date, message, user_id) VALUES (?,?,?)");
$stmt->bind_param("sss", $data, $mensagem, $userID);
if($stmt->execute()){
  header("Location: timeLine.php");
}else{
    echo "Erro!";
}

?>
