<?php

if (!isset($_SESSION) || empty($_SESSION["login"]) || $_SESSION["login"]["cliente"] != "paciente") {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
</body>
</html>