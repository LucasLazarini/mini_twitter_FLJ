<?php
session_start();
require_once('conexao.php');
$idSeguido = $_POST['teste'];
$idSeguidor = $_SESSION['id'];

$stmt = $conn->prepare("INSERT INTO followers (user_id, follower_id) VALUES (?, ?)");
$stmt->bind_param("ii", $idSeguidor, $idSeguido);
if($stmt->execute()){
    header("Location: ../front/pageTimeLine.php");
  }else {
    echo "Deu Ruim";
  }

?>
