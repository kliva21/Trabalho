<?php
	session_start();
	$nome='';
	$apelido='';
	$relacao='';
	$telefone='';
	$n_bi= '';
	$id=0;
	$update=false;
	$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));

	if (isset($_POST['guardar'])){
		$nome =$_POST['nome'];
		$apelido=$_POST['apelido'];
		$relacao=$_POST['relacao'];
		$telefone=$_POST['telefone'];
		$n_bi=$_POST['n_bi'];

		$mysqli->query("INSERT INTO responsavel(nome,apelido,relacao,telefone,n_bi) VALUES ('$nome','$apelido','$relacao','$telefone',$n_bi)")or die ($mysqli->error());
		$_SESSION['message']='Responsavel Registada com sucesso!';
		$_SESSION['msg_type']='success';

		header("location: index.php");
	}

	if (isset($_GET['delete'])){
		$id =$_GET['delete'];
		$mysqli->query("DELETE FROM responsavel WHERE id=$id")or die ($mysqli->error());
		$_SESSION['message']='Registo eliminado com sucesso!';
		$_SESSION['msg_type']='danger';
		header("location: index.php");

	}

	if (isset($_GET['edit'])){
		$id =$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM responsavel WHERE id=$id")or die ($mysqli->error());
		if(($result)){
			$row=$result->fetch_array();
			$nome=$row['nome'];
			$apelido=$row['apelido'];
			$relacao=$row['relacao'];
			$telefone=$row['telefone'];
			$n_bi=$row['n_bi'];
		}
		}


	if (isset($_POST['atualizar'])){
		$id =$_POST['id'];
		$nome =$_POST['nome'];
		$apelido=$_POST['apelido'];
		$relacao=$_POST['relacao'];
		$telefone=$_POST['telefone'];
		$n_bi=$_POST['n_bi'];

		$mysqli->query("UPDATE responsavel SET nome='$nome',apelido='$apelido',relacao='$relacao',telefone='$telefone',n_bi=$n_bi WHERE id=$id")or die ($mysqli->error());

		$_SESSION['message']='Registo atualizado com sucesso!';
		$_SESSION['msg_type']='warning';
		header("location: index.php");
	}

?>