<?php
    session_start();
    $home = "localhost";
    $bd = "faculdade";
    $user = "root";
    $pass = "";
    $tabela = "adm";
    $tabela2 = "aluno";
    $email = "lucas@fatec.sp";
    $senha = "12345";
    try{
        $conx = new PDO('mysql:home='.$home,$user,$pass);
        $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }

    catch(PDOException $e) {
        echo "Falha de conexão";
        
    } 
    
    if($conx){
        try{
        $conx->exec("CREATE DATABASE $bd");
    }

    catch(PDOException $e) {
        echo "Falha na criação do banco";
    }
    try{
        $conx = new PDO('mysql:home='.$home.';dbname='.$bd ,$user,$pass);
        $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Falha de conexão";
        
    } 
    if($conx){   
        try {	         
          $conx->exec( "CREATE TABLE $bd.$tabela (
            id    INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            email       VARCHAR(50) NOT NULL,
            senha      VARCHAR(50) NOT NULL)
            ENGINE=InnoDB DEFAULT CHARSET=latin1"); 

            $sql = $conx->prepare("INSERT INTO $tabela(id, email, senha) VALUES (null,?,?) "); 
            $sql->execute(array($email, $senha));
        }      
        catch(PDOException $e) {
            echo "Falha na criação da tabela";
        }
        if($conx){
            try{
            $conx->exec( "CREATE TABLE $bd.$tabela2 (
                matrícula    INT(11)      UNSIGNED PRIMARY KEY, 
                nome       VARCHAR(50) NOT NULL,
                email      VARCHAR(50) NOT NULL,
                sexo       VARCHAR(50) NOT NULL)
                ENGINE=InnoDB DEFAULT CHARSET=latin1");
                echo "<script> alert('banco e tabelas criados com sucesso')</script>";
            }
            catch(PDOException $e) {
                echo "Falha na criação da tabela";
        }
    }
}
    }
?>