<?php

    include '../includes/conexao.php';

    try{
        // var recebidas via $_POST
        $id     = $_POST['id'];
        $titulo = $_POST['titulo'];
        $local  = $_POST['local'];
        $valor  = $_POST['valor'];
        $desc   = $_POST['desc'];

        $sql = "UPDATE 
                    tb_viagens 
                SET 
                    `titulo` = '$titulo', 
                    `local` = '$local', 
                    `valor` = '$valor', 
                    `desc` = '$desc'
                WHERE
                    id = $id;
                ";

        $comando = $con->prepare($sql);

        $comando->execute();

        header('location: ../admin/alterar_viagens.php?id='.$id);
        
        $con = null;

    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
?>