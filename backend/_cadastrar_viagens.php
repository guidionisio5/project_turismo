<?php

// Include da conexão com banco de dados 
include '../includes/conexao.php';
// Final da conexão

try{
    // exibe as váriaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_FILES); 
    // echo "</pre>";
    // exit;

    // váriaveis que recebem os dados enviadas via POST
    $titulo = $_POST['titulo']; 
    $local = $_POST['local']; 
    $valor = $_POST['valor']; 
    $desc = $_POST['desc'];
    
    // =====================================================
    
    // Upload da imagem

    // caminho que a imagem será armazenada
    $pasta = '../img/upload/';
    
    // define um novo nome da imagem para upload
    $imagem = "imagem.jpg";

    // função php que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);

    exit;
    
    
    // =====================================================
    
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
    // echo " Cadastro realizado com sucesso";
    header('location: ../admin/gerenciar_viagens.php');

    // fecha a conexao com o banco de dados
    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>