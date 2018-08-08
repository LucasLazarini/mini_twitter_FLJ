<?php
        //o nome do meu campo de auto incremento é codigo.. mas geralmente usa-se idNome_do_campo
	$codigo = $_SESSION['id'];
	include("conexao.php");
	$sql = "select picture from Sua_tabela where id=$codigo";
	$dados = mysql_query($sql);
	$linha = mysql_fetch_array($dados);
	$foto = $linha["picture"];
	if($foto != NULL){
		header("content-type: image/jpeg");
		echo $foto;
	}else {
		$foto = "../imagens/hominho.png";
		echo $foto;

	}
	flush(); //limpa o buffer
?>
