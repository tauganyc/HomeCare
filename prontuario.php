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
    <title>Prontuario</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    date_default_timezone_set("Brazil/East");
    
    if ($_POST["id"]!="") {
        $_SESSION["id"] = $_POST["id"];
    }

    $id = $_SESSION["id"];
    $pacientes = $_SESSION["pacientes"];
    $conta = $pacientes[$id];
    if($conta==null){
        header("Locaton: pacientes.php");
    }
    // Checar se foi postado os inputs
    if ($_POST["evolucao"]!=""&&$_POST["prescricao"]!=""&&$_POST["situacaopaciente"]!="") {
        // Salvar prontuario
        $conta = addprontuario($conta, $_POST);
        unset($_SESSION["id"]);
        header("Location: home.php");
    }    
    ?>
    <div id="box">
    <?="Prontuário de ".$conta["nome"];?>
    <form action="prontuario.php" method="post">
        <input type="date" name="data" id="evolução" value="<?=date('Y-m-d')?>"></input>
        <span>Evolução</span>
        <textarea name="evolucao" id="evolucao" cols="30" rows="10" placeholder="Escreva sua evolução aqui..."></textarea>
        <span>Prescrição</span>
        <textarea name="prescricao" id="evolucao" cols="30" rows="10" placeholder="Escreva sua prescrição aqui..."></textarea>
        <span>Situação do Paciente</span>
        <select name="situacaopaciente">
            <option value="estavel" selected>Estável</option>
            <option value="melhorou">Melhorou</option>
            <option value="piorou">Piorou</option>
            <option value="altaprogramada">Alta programada</option>
        </select>  
        <input type="submit" value="Enviar" class="button"></input>
    </div>
    <div id="box">
        <h2>Dados Anteriores</h2>
        <div class="scroll" style="overflow-y:scroll;height: 100%;">
        <?php
        for($i=0;$i<count($conta["prontuarios"][$i]);$i++){
            $pro = $conta["prontuarios"][$i];
            echo "<div><span>Data: ".$pro["data"]."</span><br>";
            echo "<span>Evolução: ".$pro["evolucao"]."</span><br>";
            echo "<span>Precrição: ".$pro["prescricao"]."</span><br>";
            echo "<span>Situação do Paciente: ".$pro["situacaopaciente"]."</span><br>";
            echo "<br></div>";
        }
        ?>
        </div>
    </div>
</body>

</html>