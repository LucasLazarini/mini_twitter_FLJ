<?php
  session_start();
  require_once('conexao.php');
  $imagem = isset($_FILES['uploadFoto'])?$_FILES['uploadFoto']:"";

  if (isset($_FILES['uploadFoto'])) {
      $existeIMG = false;
      $nomeImg = $imagem['name'];
      $tiposPermitidos = ['jpg','jpeg','png'];
      if (strlen($nomeImg)>0) {
        $existeIMG = true;
      }
      $extensao = explode('.', $nomeImg);
      $extensao = end($extensao);
      $extensao = strtolower($extensao);
      $novoNomeImg = md5(time()).".".$extensao;

      if (in_array($extensao, $tiposPermitidos)) {
        $moverIMG = move_uploaded_file($_FILES['uploadFoto']['tmp_name'],'../imagens/fotosUsers/'.$novoNomeImg );
        $caminho = "../imagens/fotosUsers/".$novoNomeImg;
        $id = $_SESSION['id'];
        $query = "UPDATE users SET picture = '$caminho' WHERE id ='$id' ";
        $res = mysqli_query($conn,$query);
        if ($res) {
          $_SESSION['foto'] = $caminho;
          header("Location: ../front/alterarDados.php");
        }else {
          $errors = "Erro ao inserir no banco, Tente novamente";
        }
        // mysqli_close($conn);
      }else{
        if ($existeIMG) {
          $errors = "Tipo de arquivo não permitido, escolha extensões .jpg, .jpeg ou .png";
        }

      }
    }
?>
