<?php
    // incluindo controle de sessao
    include '../includes/controle_sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Viagens</title>
</head>

<body>
    <div id="container-formulario">
        <form action="../backend/_cadastrar_viagens.php" method="post" enctype="multipart/form-data">
            <div id="grid-formulario">
                <h2 class="titulo">Cadastro de Viagens</h2>
                <a class="sublink" href="gerenciar_viagens.php">Gerenciar viagens</a>
                <div class="item-grid">
                    <label class="subtitulo" for="titulo">Título:</label>
                    <input class="item" type="text" name="titulo" id="titulo" required>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="local">Local:</label>
                    <input class="item" type="text" name="local" id="local" required>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="valor">Valor:</label>
                    <input class="item" type="text" name="valor" id="valor" required>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="imagem">Imagem:</label>
                    <input class="item" type="file" name="imagem" id="imagem" required>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="desc">Descrição:</label>
                    <textarea class="item-desc" name="desc" id="desc"></textarea>
                </div>
                <div class="centraliza-botao">
                    <input class="botao" type="submit" value="Cadastrar">
                </div>
            </div>
        </form>
    </div>
</body>

</html>