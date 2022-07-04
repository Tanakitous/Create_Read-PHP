<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    session_start();
    include('conecta.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $conx->prepare("SELECT * FROM adm WHERE email = :email and senha = :senha");
    $sql->bindParam(':email', $email);
    $sql->bindParam(':senha', $senha);
    $sql->execute();

    if($sql->rowCount()>0){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['msg'] = "Bem-vindo ". $email;
        header("Location: cadastro.php");
    }
    else{
        $_SESSION['msg'] = "Login não existente...<p>Realize um novo login</p>";
        header("Location: login.php");
    }
}
else{
    if(!isset($_POST['email']) || empty($_POST['email']) ){
        $_SESSION['err'] = "Mensagem* <br />Email não informado...";
        header("Location: login.php");
    }
    if(!isset($_POST['senha']) || empty($_POST['senha']) ){
        $_SESSION['err'] = "Mensagem* <br />Senha não informada...";
        header("Location: login.php");
    }
    else{header("Location: login.php");}
}
?>