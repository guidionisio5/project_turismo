<?php

include "../includes/conexao.php";

try{

    $usuario = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email='$usuario' AND senha = '$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    var_dump($dados);

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>