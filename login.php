<?php
    session_start();
    unset($_SESSION['senha']);
    unset($_SESSION['email']);
    $msg = $_SESSION['msg'] ?? "Faça o login...";
    $err = $_SESSION['err'] ?? " ";
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="./login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
        <body>
            <?php
                echo "<div class=log><h1>$msg</h1></div>";
                unset($_SESSION['msg'])
            ?>
            <br>
            <div class=login>
            <form action="logar.php" method="POST">
                <div class=input>
                <label>Email:</label><br />
                <input type="text" name="email" id="email" size=>
                </div>
                <div class=input>
                <p>
                <label>Senha:</label> <br />
                <input type="password" name="senha" id="senha" size=>
                </p>
                </div>
                <p>
                <input type="submit" name="login" id="login" value="Entrar">
                </p>
                <p>
                    <?php
                        echo $err;
                        unset($_SESSION['err']);
                    ?>
                </p>
     
            </form>
            </div>  
        </body>
        <script src=""></script>
</html>