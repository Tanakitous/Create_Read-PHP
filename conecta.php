<?php 
    $home = "localhost";
    $bd = "faculdade";
    $user = "root";
    $pass = "";
    $tabela = "adm";
try{
    $conx = new PDO('mysql:home='.$home.';dbname='.$bd,$user,$pass);
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    //caso da errado
catch(PDOException $e) {
    $msgErr =  "Falha de conexão...<br />" . $e->getMessage();
    $_SESSION['msgErr'] = $msgErr;
} 

