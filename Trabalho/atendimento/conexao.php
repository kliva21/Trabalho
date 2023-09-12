<?php

        $servidor ="localhost";
        $usuario= "root";
        $senha="";
        $dbname="gest_pessoas";

        $conn = mysqli_connect($servidor,$usuario, $senha,$dbname);

        if(!$conn){
            die("Falha na conexao:" .mysqli_conect_error());
        }//elese{
            //echo "conexao realizada com suceso";}
?>
