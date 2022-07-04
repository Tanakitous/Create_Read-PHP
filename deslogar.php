<?php
    session_start();
    unset($_SESSION['username'], $_SESSION['senha'], $_SESSION['nome']);
    $_SESSION['msg'] = 'Deslogado com sucesso';
    header("Location: login.php");
?>