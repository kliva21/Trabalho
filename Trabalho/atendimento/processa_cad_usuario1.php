<?php
	include_once("conexao.php");
	$Nome_do_produto = $_POST['Nome_do_produto'];
	$Quantidade = $_POST['Quantidade'];
	$Id_cliente = $_POST['cliente'];
	
	//echo "$nome_usuario - $email_usuario";
	
	$result_usuario = "INSERT INTO compra(Nome_do_produto, Quantidade, Id_cliente) VALUES ('$Nome_do_produto','$Quantidade', '$Id_cliente', '$select_niveis_acesso', NOW())";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	
	if(mysqli_affected_rows($conn) != 0){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
					<script type=\"text/javascript\">
						alert(\"Usuario cadastrado com Sucesso.\");
					</script>
				";	
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
					<script type=\"text/javascript\">
						alert(\"O Usuario não foi cadastrado com Sucesso.\");
					</script>
				";	
			}
?>