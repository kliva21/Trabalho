<?php
	include_once("conexao.php");
	$data_atendimento = $_POST['data_atendimento'];
	$Quantidade = $_POST['peso'];
	$observacao = $_POST['observacao'];
	$id_funcionario = $_POST['id_funcionario'];
	$id_Bebe = $_POST['id_Bebe'];
	
	//echo "$nome_usuario - $email_usuario";
	
	$result_usuario = "INSERT INTO compra(data_atendimento, peso, observacao ,id_funcionario,id_bebe) VALUES ('$data_atendimento','$peso','$observacao' ,'$id_funcionario','$Id_Bebe','$select_niveis_acesso', NOW())";
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