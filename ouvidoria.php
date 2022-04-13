<?php
include_once "functions.php";
seasonstart();
if($_SESSION["login"]["cliente"] != "paciente"){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="box">
        <form action="ouvidoria.php" method="post">
            <h1>Nos conte como foi sua experiência</h1>
            <div>
                <h2>Como foi atendido:</h2>
                <label><input type="radio" name="atendimento" value="1">1</label>
                <label><input type="radio" name="atendimento" value="2">2</label>
                <label><input type="radio" name="atendimento" value="3">3</label>
                <label><input type="radio" name="atendimento" value="4">4</label>
                <label><input type="radio" name="atendimento" value="5">5</laçl>
            </div>
            <div>
                <h2>você gostaria de receber um feedback da sua ouvidoria?</h2>
                <label><input type="radio" name="feedback" value="sim"">sim</label>
                <label><input type="radio" name="feedback" value="nao"">não</label>
            </div>
            <br>
            <span>descreva oque precisamos melhorar</span>
            <textarea name=" descritivo" id="descritivo" cols="30" rows="10" placeholder="nos informe oque acha que precisamos melhorar..."></textarea>

                    <?php
                    if (!empty($_POST)) {
                        $output="";
                        if ($_POST["atendimento"] == "" or $_POST["feedback"] == "" or $_POST["descritivo"] == "") {
                            $output = "precisamos que preencha sua avaliação";
                        } elseif ($_POST["feedback"] == "sim") {
                            $_POST["email"] = $_SESSION["login"]["email"];
                            saveouvidoria($_POST);
                            header("Location:home.php");
                        } 
                    }
                    $button = '<input type="submit" value="Enviar" class="button">';
                    echo $button;
                    echo '<br>'.$output;
                    ?>
        </form>
    </div>
</body>

</html>