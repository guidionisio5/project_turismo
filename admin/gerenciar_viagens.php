<?php
    // incluindo controle de sessao
    include '../includes/controle_sessao.php';
    // incluindo conexao
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
    <div id="container-gerenciar">
        <div id="tabela-gerenciar">
            <h2 class="titulo">Gerenciar Viagens</h2>
            <a class="sublink" href="cadastrar_viagens.php">Cadastrar viagens</a>
            <a class="sublink" href="../includes/logout.php">Sair</a>
            <table class="borda-gerenciar">
                <tr class="item-gerenciar">
                    <th class="subtitulo-gerenciar">ID</th>
                    <th class="subtitulo-gerenciar">Título</th>
                    <th class="subtitulo-gerenciar">Local</th>
                    <th class="subtitulo-gerenciar">Valor</th>
                    <th class="subtitulo-gerenciar">Descrição</th>
                    <th class="subtitulo-gerenciar">Imagem</th>
                    <th class="subtitulo-gerenciar">Alterar</th>
                    <th class="subtitulo-gerenciar">Deletar</th>
                </tr>
                <?php 
                    foreach($dados as $viagens):
                ?>
                <tr class="item-gerenciar">
                    <td class="subtitulo-gerenciar"><?php echo $viagens['id'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $viagens['titulo'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $viagens['local'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $viagens['valor'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $viagens['desc'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $viagens['imagem'];?></td>
                    <td class="subtitulo-gerenciar">
                        <a class="table-link" href="../admin/alterar_viagens.php?id=<?php echo $viagens['id'];?>">Alterar</a>
                    </td>
                    <td class="subtitulo-gerenciar">
                        <a class="table-link" href="../backend/_deletar_viagens.php?id=<?php echo $viagens['id'];?>">Deletar</a>
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