<?php
    require 'config.php';

    
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');  
    $idade = filter_input(INPUT_POST, 'idade');  
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 

    //verificar se o id, o nome e o email são válidos
    if($id && $name && $sobrenome && $idade && $email) {

        $sql = $pdo->prepare("INSERT INTO tbl_cadastrar (nome,sobrenome,idade,email) VALUES (:name,:sobrenome,:idade,:email WHERE id = :id)" );
        $sql->bindValue(':name',$name); 
        $sql->bindValue(':sobrenome',$sobrenome); 
        $sql->bindValue(':idade',$idade); 
        $sql->bindValue(':email',$email); 
        $sql->bindValue(':id',$id); 
        $sql->execute();

        header("Location:amem.php");
        exit;

    } else {
        //caso contrário, vai retorna para página adicionar.php e não registra.
        header('Location: index.php'); 
        exit;
    }