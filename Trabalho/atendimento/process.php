<?php
	session_start();
	$data_atendimento='';
	$peso='';
	$observacao='';
	$id=0;
	$update=false;
	$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));

	if (isset($_POST['guardar'])){
		$nome =$_POST['data_atendimento'];
		$sobrenome=$_POST['peso'];
		$morada=$_POST['observacao'];
		

		$mysqli->query("INSERT INTO atendimento (data_atendimento, peso, observacao) VALUES ('$data_atendimento','$peso','$observacao')")or die ($mysqli->error());
		$_SESSION['message']='Atendimento Registada com sucesso!';
		$_SESSION['msg_type']='success';

		header("location: index.php");
	}

	if (isset($_GET['delete'])){
		$id =$_GET['delete'];
		$mysqli->query("DELETE FROM atendimento WHERE id=$id")or die ($mysqli->error());
		
		$_SESSION['message']='Registo eliminado com sucesso!';
		$_SESSION['msg_type']='danger';
		header("location: index.php");

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
			
		}

	}

	if (isset($_POST['atualizar'])){
		$id =$_POST['id'];
		$data_atendimento =$_POST['data_atendimento'];
		$peso=$_POST['sobrenome'];
		$observacao=$_POST['morada'];
		

		$mysqli->query("UPDATE atendimento SET data_atendimento='$data_atendimento',peso='$peso',observacao='$observacao' WHERE id=$id")or die ($mysqli->error());

		$_SESSION['message']='Registo atualizado com sucesso!';
		$_SESSION['msg_type']='warning';
		header("location: index.php");
	}

?>