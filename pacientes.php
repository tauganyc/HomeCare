<?php
include_once "functions.php";
seasonstartmedico();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="box" class="fodabox">
        <?php
            $pacientes=loadpacientes();
            $_SESSION["pacientes"] = $pacientes;
            echo "<form method='post' action='prontuario.php'>";
            for($i=0;$i<count($pacientes);$i++){                
                echo "<button class='button' type='submit' name='id' value='".$i."'>".$pacientes[$i]["nome"]."</button><BR>";                
            }
            echo "</form>";
        ?>
    </div>
</body>

</html>