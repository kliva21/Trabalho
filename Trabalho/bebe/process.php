<?php
	session_start();
	$nome='';
	$apelido='';
	$sexo='';
	$data_nascimento='';
	$morada='';
	$concelho='';
	$id_responsavel='';
	$id=0;
	$update=false;
	$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));

	if (isset($_POST['guardar'])){
		$nome=$_POST['nome'];
		$apelido=$_POST['apelido'];
        $sexo=$_POST['sexo'];
		$data_nascimento=$_POST['data_nascimento'];
		$morada=$_POST['morada'];
		$concelho=$_POST['concelho'];
		$id_responsavel=$_POST['id_responsavel'];
						
				

		$mysqli->query("INSERT INTO bebe (nome, apelido, sexo, data_nascimento, morada, concelho, id_responsavel) VALUES ('$nome','$apelido','$sexo','$data_nascimento','$morada','$concelho','$id_responsavel')")or die ($mysqli->error());
		$_SESSION['message']='Bebe Registada com sucesso!';
		$_SESSION['msg_type']='success';

		header("location: index.php");
	}

	

	if (isset($_GET['delete'])){
		$id =$_GET['delete'];
		$mysqli->query("DELETE FROM bebe WHERE id=$id")or die ($mysqli->error());
		$_SESSION['message']='Registo eliminado com sucesso!';
		$_SESSION['msg_type']='danger';
		header("location: index.php");

	}

	if (isset($_GET['edit'])){
		$id =$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM bebe WHERE id=$id")or die ($mysqli->error());
		if(($result)){
			$row=$result->fetch_array();
			$nome=$row['nome'];
			$apelido=$row['apelido'];
			$sexo=$row['sexo'];
			$Data_nascimento=$row['Data_nascimento'];
			$morada=$row['morada'];
			$concelho=$row['concelho'];
			$id_responsavel=$row['id_responsavel'];

			$result_niveis_acessos = "SELECT * FROM bebe ";
						$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
						while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
					<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?><?php
						}


			
		}

	}

	if (isset($_POST['atualizar'])){
		$id =$_POST['id'];

		$Data_nascimento=$_POST['Data_nascimento'];
		$nome=$_POST['nome'];
		$apelido=$_POST['apelido'];
		$sexo=$_POST['sexo'];
		$Data_nascimento=$_POST['Data_nascimento'];
		$morada=$_POST['morada'];
		$concelho=$_POST['concelho'];
		$id_responsavel=$_POST['id_responsavel'];

		$mysqli->query("UPDATE bebe SET nome='$nome',apelido='$apelido',  sexo='$sexo', Data_nascimento='$Data_nascimento',morada='$morada',concelho='$concelho', id_responsavel='$id_responsavel'WHERE id=$id")or die ($mysqli->error());

		$_SESSION['message']='Registo atualizado com sucesso!';
		$_SESSION['msg_type']='warning';
		header("location: index.php");
	}

?>