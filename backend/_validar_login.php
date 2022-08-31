<?php

include "../includes/conexao.php";

try{

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email='$email' AND BINARY senha = '$senha' AND ativo = 1";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($dados);

    // verifica se existem resgistos dentro da variavel dados
    if($dados != null){
        // inicia a sessao
        session_start();
        // var_dump(session_id()); 
        // exit;

        // criar uma variavel de sessao e adiciona o email digitado
        $_SESSION['usuario'] = $email;
        // exibe o valor adiconado na variavel de sessao email
        // var_dump($_SESSION['email']);
        // exit;

        // se o ususario e senha são validos, irá entrar nesse bloco de código
        header('location: ../admin/gerenciar_viagens.php');
    }else{
        // se o usuario ou senha sÂo invalidos, iram entrar nesse bloco de código
        // echo "Email ou senha inválida";
        header('location: ../admin/index.html');
    }

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>