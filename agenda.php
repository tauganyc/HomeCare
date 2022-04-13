<?php
include_once "functions.php";
seasonstart();
if ($_SESSION["login"]["cliente"] != "paciente") {
    header("Location:index.php");
}
date_default_timezone_set("Brazil/East");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="box" class="fodabox">
        <form action="agenda.php" method="post">
            <div>
            <h2>Agende sua consulta:</h2><br>
            <span>Selecione o dia:</span><br>
            <input type="date" name="data" id="evolução" value="<?= date('Y-m-d') ?>"></input><br>
            <span>Selecione a hora:</span><br>
            <select name="hora" class="texto" id="horario">
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:00">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
            </select><br>
            <span>Qual o motivo da Consulta?</span><br>
            <textarea name="motivo" id="motivo" cols="15" rows="5"></textarea><br>
            <input type="submit" value="Enviar" class="button">
            </div>
        </form>
        <?php
        if (isset($_POST) && !empty($_POST)) {
            if (empty($_POST["data"])) {
                $output = 'preencha a data.';
            } elseif (empty($_POST["hora"])) {
                $output = 'selecione um horario.';
            } elseif (empty($_POST["motivo"])) {
                $output = 'selecione o motivo.';
            } elseif (consultamarcada($_POST["data"], $_POST["hora"])) {
                $output = 'selecione outro horario ou data.';
            } else {
                addagenda($_SESSION["login"],$_POST);
            }
        }
        echo $output;
        ?>
    </div>
</body>

</html>