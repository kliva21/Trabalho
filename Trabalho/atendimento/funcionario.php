<?php include "cabecalho.php"; ?>
        <fieldset>
        <legend><br>Registo de bebe de tendimento</br> </legend>
        <form method="post" action="insere_funcionario.php">
            <imput type="text" name="nome" placeholder="Nome de funcionario..."/><br/>
            <textarea name="descricao" placeholder="Descrição da disciplina..."></textarea><br/>
            <?php

                    include "conexao.php";
                    $select = "SELECT * FROM funcionario ORDER BY nome";
                    $result= mysqli_query($conexao,$select)
                            or die ("Erro no sistema. contacte o admin.");
                    echo "<select name='id_funcionario' required>";
                    echo "<option label='::SELECINE UM FUNCIONARIO::'</option>";
                    while($linha=mysql_fetch_assoc($resultado)){
                        echo "<option value='".$linha["prontuario"]."'>".$linha["nome"]."<option>";

                    }
                    echo "</select>";
                ?>
                <br/>
                <button>Enviar</button>~
                </form>
                </fieldset>
                </body>
                </html>

    