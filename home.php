<?php
include_once "functions.php";
seasonstart();
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
    <?php
        if($_SESSION["login"]["cliente"] == "medico"){
            echo '<div id="box" class="fodabox">
            <a href="./pacientes.php"><button class="button">Pacientes</button></a>
            <a href="./consultas.php"><button class="button">Consultas</button></a>
            <a href="./respostasouvidoria.php"><button class="button">Respostas Ouvidoria</button></a>
        </div>';
        }
        elseif($_SESSION["login"]["cliente"] == "paciente"){
            echo '<div id="box" class="fodabox">
            <a href="./historicoconsultas.php"><button class="button">Historico de consultas</button></a>
            <a href="./agenda.php"><button class="button">Solicite sua consulta</button></a>
            <a href="./ouvidoria.php"><button class="button">Faça sua Ouvidoria</button></a>
        </div>';
        }
    ?>
    
</body>

</html>