<?php
session_start();
include('conecta.php');
if ((!isset($_SESSION['email'])) or (!isset($_SESSION['senha']))) {
    session_destroy();
    header('Location: login.php');
} else {
    $err = $_SESSION['err'] ?? "";
    $msg = $_SESSION['msg'] ?? "Bem vindo, " . $_SESSION['email'];
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
        <a class="sair" href="deslogar.php">Sair</a>
    </div>
    <p>
    <div class=matricula>
        <form action="incluir.php" method="POST">

            <label>Matrícula:</label>
            <input type="text" name="matricula" id="Matricula">
            <p>
                <label>Nome:</label>
                <input type="text" name="nome" id="Nome">
            </p>
            <p>
                <label>Email:</label>
                <input type="text" name="email1" id="Email">
            </p>
            <p>
                <input type="radio" name="sexo" value="M" class=radio>
                <label>Masculino</label><br />
                <input type="radio" name="sexo" value="F" class=radio>
                <label>Feminino</label> <br />
            <p>
                <input type="submit" value="Incluir" class=botao><br />
                <label id="msgerror"></label>
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
            <input type="submit" value="Listar" id=botao><br />
        </div>
    </form>
    </p>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col"> Matrícula </th>
                    <th scope="col"> Nome </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Sexo </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $conx->prepare("SELECT * FROM $bd.aluno ORDER BY nome DESC");
                $sql->execute();

                $result = $sql->fetchAll();
                foreach ($result as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value['matrícula'] . "</td>";
                    echo "<td>" . $value['nome'] . "</td>";
                    echo "<td>" . $value['email'] . "</td>";
                    echo "<td>" . $value['sexo'] . "</td>";
                    echo "<td> 
        <a href= del.php> Excluir </a> 
        <a href= edit.php> Editar </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="verificar.js"></script>
</body>

</html>