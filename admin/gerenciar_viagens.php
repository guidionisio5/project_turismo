<?php

    include '../includes/conexao.php';

    try{
        $sql = "SELECT * FROM tb_viagens";

        $comando = $con->prepare($sql);

        $comando->execute();

        $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

        // visualização do que a var está recebendo
        // echo "<pre>";
        // var_dump($dados);
        // echo "</pre>";

    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gerenciar Viagens</title>
</head>
<body>
    <div id="container">
        <h2 class="titulo">Gerenciar Viagens</h2>
        <hr>
        <a class="sublink" href="cadastrar_viagens.html">Cadastrar viagens</a>
        <div id="tabela">
            <table>
                <tr class="item-tabela">
                    <th>ID</th>
                    <th>Título</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php 
                    foreach($dados as $viagens):
                ?>
                <tr class="item-tabela">
                    <td><?php echo $viagens['id'];?></td>
                    <td><?php echo $viagens['titulo'];?></td>
                    <td><?php echo $viagens['local'];?></td>
                    <td><?php echo $viagens['valor'];?></td>
                    <td><?php echo $viagens['desc'];?></td>
                    <td>
                        <a href="../admin/alterar_viagens.php?id=<?php echo $viagens['id'];?>">Alterar</a>
                    </td>
                    <td>
                        <a href="../backend/_deletar_viagens.php?id=<?php echo $viagens['id'];?>">Deletar</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </table>
        </div>
    </div>    
    <?php 
        $con = null;
    ?>                
</body>
</html>