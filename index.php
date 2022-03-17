<?php
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>inicio</title>
</head>

<body>
    <form id="box" action="index.php" , method="POST">
        <h1>Home Care</h1>
        <h2>Você ja é nosso cliente?</h2>

        <div>
            <label><input type="radio" name="cliente" value="sim">Sim</label>
            <label><input type="radio" name="cliente" value="nao">Não</label>
        </div>

        <?php

        $button = '<input type="submit" value="Enviar" class="button">';
        echo $button;

           // include('somos.php');
            include_once('functions.php');
            VerificaCliente()
            
        ?>
    </form>
</body>

</html>