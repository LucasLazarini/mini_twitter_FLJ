<?php
    require_once("conexao.php");
    session_start();
    $twitt = $_GET['idtwitt'];
    $tipo = 0;
    $date = date('d/m/y');
    $id = $_SESSION['id'];
    echo $twitt;
    echo $id;
    $stmt = $conn->prepare("INSERT INTO likes (user_id, tweet_id, dateTime, type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id, $twitt, $date, $tipo);
    if($stmt->execute()){
      header("Location: ../front/pageTimeLine.php");
    }else{
      echo "Falha ao curtir";
    }
 ?>
