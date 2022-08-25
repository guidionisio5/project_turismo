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
    
    // Upload da imagem
    // armazena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];


    // descobrir a extensão da imagem 
    // formatos válidos: jpg/jpeg/png
    // $extensao = phpinfo(['imagem']['name'],PATHINFO_EXTENSION);
    $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);
    // verificacao de extensao da imagem, se for diferente dos formatos validos, irá retornar ao usuario 
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        echo 'Formato de imagem inválido';
        exit;     
    } 
    
    // gera um nome aleatorio para imagem(hash)
    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));
    // echo $hash;
    // exit;
    // juntamos o hash mais a extensao para ter o nome final da imagem  
    $nome_final_imagem = $hash.'.'.$extensao;
    

    // caminho que a imagem será armazenada
    $pasta = '../img/upload/';
    // função php que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);


    // váriavel que recebe a querry SQL que será executado no BD
    $sql = "INSERT INTO
                tb_viagens
            (   
                `titulo`,
                `local`,
                `valor`,
                `desc`,
                `imagem`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$valor',
                '$desc',
                '$nome_final_imagem'
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