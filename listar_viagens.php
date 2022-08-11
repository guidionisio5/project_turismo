<?php
// incluindo arquivo de conexao
include 'includes/conexao.php';

try{
    // monta a query sql
    $sql = "SELECT * FROM tb_viagens";

    // prepara a execução da querry SQL acima
    $comando = $con->prepare($sql);

    // executa o comando com a querry no banco de dados
    $comando->execute();

    // criando a var que irá armazenar os dados, e setando o fetch em modo associativo(chave/valor) 
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
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Viagens</title>
</head>
<body>    
    <div id="container">
        <h2 class="titulo">Lista de Viagens</h2> 
        <div id="grid-viagens">
            <?php
                foreach($dados as $d):
            ?>
            <figure class="figure-viagens">
                <img class="img-viagens" src="img/viagem-faltando.png" alt="Imagem da viagem">
                <figcaption class="figcaption-viagens">
                    <h4><?php echo $d['titulo'];?></h4>
                    <h5><?php echo $d['local'];?></h5>
                    <h5>R$ <?php echo $d['valor'];?></h5>
                    <small><?php echo $d['desc'];?></small>
                    <button class="botao-viagens">Comprar</button>
                </figcaption>
            </figure>
            
            <?php endforeach;?>

        </div>
    </div>
    <?php 
        $con = null;
    ?> 
</body>
</html>