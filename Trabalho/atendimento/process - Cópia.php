<?php
	session_start();
	$data_atendimento='';
	$peso='';
	$observacao='';
	$id_funcionario='';
	$id_Bebe='';
	$id=0;
	$update=false;
	$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));

	if (isset($_POST['guardar'])){
		$data_atendimento=$_POST['data_atendimento'];
		$peso=$_POST['peso'];
		$observacao=$_POST['observacao'];
		$id_funcionario=$_POST['id_funcionario'];
		$id_Bebe=$_POST['id_Bebe'];

	
						
				

		$mysqli->query("INSERT INTO atendimento (data_atendimento, peso, observacao, id_funcionario, id_Bebe) VALUES ('$data_atendimento','$peso','$observacao','$id_funcionario','$id_Bebe')")or die ($mysqli->error());
		$_SESSION['message']='Atendimento Registada com sucesso!';
		$_SESSION['msg_type']='success';

		header("location: index (2).php");
	}

	

	if (isset($_GET['delete'])){
		$id =$_GET['delete'];
		$mysqli->query("DELETE FROM atendimento WHERE id=$id")or die ($mysqli->error());
		$_SESSION['message']='Registo eliminado com sucesso!';
		$_SESSION['msg_type']='danger';
		header("location: index (2).php");

	}

	if (isset($_GET['edit'])){
		$id =$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM atendimento WHERE id=$id")or die ($mysqli->error());
		if(($result)){
			$row=$result->fetch_array();
			$data_atendimento=$row['data_atendimento'];
			$peso=$row['peso'];
			$observacao=$row['observacao'];
			$id_funcionario=$row['id_funcionario'];
			$id_Bebe=$row['id_Bebe'];
			
			$result_niveis_acessos = "SELECT * FROM bebe ";
						$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
						while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
					<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?><?php
						}

		}

	}

	if (isset($_POST['atualizar'])){
		$id =$_POST['id'];

		$data_atendimento=$_POST['data_atendimento'];
		$peso=$_POST['peso'];
		$observacao=$_POST['observacao'];
		$id_funcionario=$_POST['id_funcionario'];
		$id_Bebe=$_POST['id_Bebe'];

		$mysqli->query("UPDATE atendimento SET data_atendimento='$data_atendimento',peso='$peso', observacao='$observacao', id_funcionario='$id_funcionario', id_Bebe='$id_Bebe'WHERE id=$id")or die ($mysqli->error());

		$_SESSION['message']='Registo atualizado com sucesso!';
		$_SESSION['msg_type']='warning';
		header("location: index (2).php");
	}

?>