<?php
    session_start();
    include('conecta.php');
    if((!isset($_SESSION['email'])) or (!isset($_SESSION['senha']))){
        session_destroy();
        header('Location: login.php');
    }
    else{
        $msg = $_SESSION['msg'] ?? "Bem vindo, ".$_SESSION['email'];
        $err = $_SESSION['err'] ?? "";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cadastro.css">
        <title>Cadastro</title>
    </head>
    <body>
        <div class=inicio>
        <h1>Cadastro de Alunos</h1>
        <?php
            echo "<label id=logou><b>$msg</b></label>";
            unset($_SESSION['msg']);
        ?>
        <a href="deslogar.php" class=sair>Sair</a>
        </div>
        <p>
        <div class= matricula>
        <form action="incluir.php" method="POST">

                <label>Matrícula:</label>
                <input require type="text"name="matricula" id="Matricula">
                <p>
                <label>Nome:</label>
                <input require type="text" name="nome" id="Nome">
                </p>
                <p>
                <label>Email:</label>
                <input require type="text" name="email1" id="Email" >
                </p>
                <p>
                <input type="radio" name="sexo" value="M" class=radio>
                <label>Masculino</label><br />
                <input type="radio" name="sexo" value="F" class=radio> 
                <label>Feminino</label> <br />
                <p>
                <input type="submit" value="Incluir" id="botao1" class=botao><br />
                <label id ="msgerror"></label>
                <?php
                    echo $err;
                    unset($_SESSION['err']);
                ?>
                </p>
        </form>
    </div>
</p>
        <p>
            <form action="listar.php" method="POST" id="forms2">
                <div>
                    <input type="submit" value= "Listar" id="botao" class=botao >
                </div>
                </form>
        </p>
        <script src="./verificar.js"></script>
    </body>
</html>