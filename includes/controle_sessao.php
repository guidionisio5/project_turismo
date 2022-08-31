<?php
    // Arquivo que protege as paginas administrativas do site 
    // Caso o usuario nao estava logado, ira ser redirecionado para a tela de login

    // inicia a sessao
    session_start();

    // cria a variavel $usuario que ira receber o valor da variavel sessao $_SESSION['usuario']
    $usuario = $_SESSION['usuario'];

    // se o usuario nao estiver logado, redireciona para a tela de login
    if($usuario == null){
        header('location: index.html');
        exit;
    }
?>    