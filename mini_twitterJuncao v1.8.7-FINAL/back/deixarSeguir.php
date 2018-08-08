<?php
session_start();
require_once('conexao.php');
$idTwitt = $_POST['idTwitt'];

$stmt = $conn->prepare("DELETE FROM followers WHERE id = (?)");
$stmt->bind_param("i", $idTwitt);
if($stmt->execute()){
    header("Location: ../front/pageTimeLine.php");
  }else {
    echo "Deu Ruim";
  }

?>
