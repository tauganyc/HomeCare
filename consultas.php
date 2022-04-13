<?php
include_once "functions.php";
seasonstart();
if($_SESSION["login"]["cliente"] != "medico"){
    header("Location:index.php");
}

if(!empty($_POST)){
    if($_POST["agenda"]!=""){
        $j=$_POST["agenda"];
        $i=$_POST["paciente"];

        $lista_de_pacientes = $_SESSION["pacientes"];
        $paciente = $lista_de_pacientes[$i];

        $lista_de_agendas = $paciente["agenda"];
        $agenda = $lista_de_agendas[$j];

        deleteagenda($paciente, $agenda);
    }
}
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
    <h1>consultas marcadas:</h1>
        <?php
            $pacientes=loadpacientes();
            $_SESSION["pacientes"] = $pacientes;
            echo "<form method='post' action='consultas.php'>";
            foreach($pacientes as $i=>$paciente){
                $agendas=$paciente["agenda"];
                foreach($agendas as $j=>$agenda){
                    echo "<div>
                    <span>Nome do Paciente:".$paciente["nome"]."</span><br>
                    <span>Data: ".$agenda["data"]."</span><br>
                    <span>Hora:".$agenda["hora"]."</span><br>
                    <span>Motivo: ".$agenda["motivo"]."</span><br>
                    <input type='hidden' name='agenda' value='".$j."'>
                    <button class='button' type='submit' name='paciente' value='".$i."'>Consulta Feita</button><BR>
                    </div>";
                }
            }
            echo "</form>";
            
        ?>
        <a href="./home.php"><button class="button">Voltar</button></a>
    </div>
</body>

</html>