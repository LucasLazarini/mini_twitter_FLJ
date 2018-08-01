<?php
    require_once("conexao.php");
    session_start();

    if($_GET['id']){
      $twitt = $_GET['id'];
      $tipo = 0;
      $date = date('d/m/y');
      $idUser = $_SESSION['id'];
      $query2 = "select tweet_id, user_id from likes ";
      $result2 = $conn->query($query2) or die($conn->error);
      $aux=-1;
      $idDeslike = 0;
      while ($dados2 = $result2->fetch_array()){
        if($idUser == $dados2['user_id'] && $dados2['tweet_id'] == $twitt){
          $aux = 1;
          break;
        }else {
          $aux = 0;
        }
      }
      echo $aux;
      if($aux==0){
        $stmt = $conn->prepare("INSERT INTO likes (user_id, tweet_id, dateTime, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idUser, $twitt, $date, $tipo);
        if($stmt->execute()){
          #echo "curtiu";
          header("Location: ../front/pageTimeLine.php");
        }else{
          echo "Falha ao curtir";
        }
      }else {
        $query = "delete from likes where tweet_id = $twitt and user_id = $idUser";

        if(mysqli_query($conn,$query)){
          #echo "excluiu";
          header("Location: ../front/pageTimeLine.php");
        }else{
          echo "Falha ao descurtir";
        }
      }
    }
 ?>
