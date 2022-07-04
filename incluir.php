<?php
    if(isset($_POST) && !empty($_POST)){
        session_start();
        include("conecta.php"); 
        extract($_POST);
        $nome = $_POST['nome'];
        $email = $_POST['email1'];
        $sexo = $_POST['sexo'];
        $matricula = $_POST['matricula'];
        try{
            if(!isset($_POST['nome']) || empty($_POST['nome'])){
                $_SESSION['err']="Mensagem* <br />Nome não informado...";
                header("location: ./cadastro.php");
            }
            if(!isset($_POST['email1']) || empty($_POST['email1'])){
                $_SESSION['err']="Mensagem* <br />Email não informado...";
                header("location: ./cadastro.php");
            }
            if(!isset($_POST['sexo'])|| empty($_POST['sexo'])){
                $_SESSION['err']="Mensagem* <br />Sexo não informado...";
                header("location: ./cadastro.php");
            }
            if(!isset($_POST['matricula'])|| empty($_POST['matricula'])){
                $_SESSION['err']="Mensagem* <br /> Matrícula não informada...";
                header("location: ./cadastro.php");
            }
            $sql = $conx->prepare("INSERT INTO aluno(matrícula, nome, email, sexo) VALUES (?,?,?,?) "); 
            $sql->execute(array($matricula, $nome, $email, $sexo));
            $_SESSION['err'] = "Incluído!";
            header("location: ./cadastro.php");
        }
        catch(PDOException $e){
            echo "<h1>falha na inclusão :(</h1>";
        }

    }
?>