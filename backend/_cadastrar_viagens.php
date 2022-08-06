<?php

// Include da conexão com banco de dados 
include '../include/conexao.php';
// Final da conexão

try{
    // exibe as váriaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_POST); 
    // echo "</pre>";

    // váriaveis que recebem os dados enviadas via POST
    $titulo = $_POST['titulo']; 
    $local = $_POST['local']; 
    $valor = $_POST['valor']; 
    $desc = $_POST['desc']; 
    
    // váriavel que recebe a querry SQL que será executado no BD
    $sql = "INSERT INTO
                tb_viagens
            (   
                `titulo`,
                `local`,
                `valor`,
                `desc`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$valor',
                '$desc'
            )
            ";
    
    // prepara a execução da querry SQL acima
    $comando = $con->prepare($sql);

    // executa o comando com a querry no banco de dados
    $comando->execute();

    // exibe mensagem de sucesso ao inserir
    echo " Cadastro realizado com sucesso";

    // fecha a conexao com o banco de dados
    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>