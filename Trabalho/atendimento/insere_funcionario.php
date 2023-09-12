<?php
include "cabecalho.php";
include "conexao.php";
$nome = $_POST["nome"];
$descricao = $_POST["id_funcionario"];
$descricao = $_POST["id_Bebe"];


$insert = "INSERT INTO atendimento(
                    data_atendimento,
                    peso,
                    observacao,
                    id_funcionario
                    id_Bebe,
                    )
                    value('$data_atendimento','$peso','$observacao','$id_funcionario','$id_bebe')";

 mysqli_query($conexao,$insert) or
                    die("Houve um erro. avise o adminstrador");

echo "funcionario inserido com sucesso.";
?>
</body>
</html>