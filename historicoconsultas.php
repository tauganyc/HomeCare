<?php
include_once "functions.php";
seasonstartpaciente();
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
    <div id="box" class="fodabox">
        <h1>Seu histórico de consultas</h1>
        <?php
        $conta = $_SESSION["login"]; 
        for ($i = 0; $i < count($conta["prontuarios"]); $i++) {
            $pro = $conta["prontuarios"][$i];
            echo "<div><span>Data: " . $pro["data"] . "</span><br>";
            echo "<span>Precrição: " . $pro["prescricao"] . "</span><br>";
            echo "<span>Situação do Paciente: " . $pro["situacaopaciente"] . "</span><br>";
            echo "</div><br>";
        }
        ?>
        <div><a href="./homepac.php"><button class="button">voltar</button></a></div>
    </div>
</body>

</html>