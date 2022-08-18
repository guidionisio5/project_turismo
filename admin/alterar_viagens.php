<?php

    include '../includes/conexao.php';

    // captura a var global ID recebida via GET
    $id = $_GET['id'];

    try{

        $sql = "SELECT * FROM tb_viagens WHERE id = $id";

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
    <title>Alterar Viagens</title>
</head>
<body>
    <div id="container">
        <h2 class="titulo">Alterar Viagens</h2>
        <hr>
        <a class="sublink" href="gerenciar_viagens.php">Gerenciar viagens</a>
        <form action="../backend/_alterar_viagens.php" method="post">
            <div id="grid-alterar">
                <div class="item">
                    <label class="subtitulo" for="id">ID</label>
                    <input type="text" name="id" id="id" value="<?php echo $dados[0]['id']?>" readonly>
                </div>
                <div class="item">
                    <label class="subtitulo" for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo']?>">
                </div>
                <div class="item">
                    <label class="subtitulo" for="local">Local</label>
                    <input type="text" name="local" id="local" value="<?php echo $dados[0]['local']?>">
                </div>
                <div class="item">
                    <label class="subtitulo" for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor']?>">
                </div>
                <div class="sub-grid">
                    <div class="item-desc">
                        <label class="subtitulo" for="desc">Descrição</label>
                        <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $dados[0]['desc']?></textarea>
                    </div>
                    <div class="centraliza-botao">
                        <input class="botao" type="submit" value="Salvar">
                    </div>
                </div>
            </div>
    
        </form>
    </div>
    <?php 
        $con = null;
    ?>
</body>
</html>
 