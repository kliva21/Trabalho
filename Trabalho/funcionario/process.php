<?php
	session_start();
	$nome='';
	$data_nascimento='';
	$morada='';
	$telefone='';
	$area_formado='';
	$nfi='';
	
	$id=0;
	$update=false;
	$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));
	
	if (isset($_POST['guardar'])){
		$nome=$_POST['nome'];
		$data_nascimento=$_POST['data_nascimento'];
		$morada=$_POST['morada'];
        $telefone=$_POST['telefone'];
        $area_formado=$_POST['area_formado'];
        $nfi=$_POST['nfi'];


		$mysqli->query("INSERT INTO funcionario (nome, data_nascimento, morada, telefone, area_formado, nfi ) VALUES ('$nome','$data_nascimento','$morada', '$telefone', '$area_formado', '$nfi')")or die ($mysqli->error());
		$_SESSION['message']='funcionario Registada com sucesso!';
		$_SESSION['msg_type']='success';

		header("location: index.php");
	}

	if (isset($_GET['delete'])){
		$id =$_GET['delete'];
		$mysqli->query("DELETE FROM funcionario WHERE id=$id")or die ($mysqli->error());
		$_SESSION['message']='Registo eliminado com sucesso!';
		$_SESSION['msg_type']='danger';
		header("location: index.php");

	}

	if (isset($_GET['edit'])){
		$id =$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM funcionario WHERE id=$id")or die ($mysqli->error());
		if(($result)){
			$row=$result->fetch_array();
			$nome=$row['nome'];
			$data_nascimento=$row['data_nascimento'];
			$morada=$row['morada'];
			$telefone=$row['telefone'];
			$area_formado=$row['area_formado'];
			$nfi=$row['nfi'];
	
		}

	}

	if (isset($_POST['atualizar'])){
		$id =$_POST['id'];
		$nome =$_POST['nome'];
		$data_nascimento=$_POST['data_nascimento'];
		$morada=$_POST['morada'];
		$telefone=$_POST['telefone'];
		$morada=$_POST['area_formado'];
		$nfi=$_POST['nfi'];

		$mysqli->query("UPDATE funcionario SET nome='$nome', data_nascimento='$data_nascimento',morada='$morada', telefone='$telefone', area_formado='$area_formado',nfi='$nfi'WHERE id=$id")or die ($mysqli->error());

		$_SESSION['message']='Registo atualizado com sucesso!';
		$_SESSION['msg_type']='warning';
		header("location: index.php");
	}

?>