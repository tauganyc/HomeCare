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
    <title>Respostas Ouvidoria</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="box">
        <a href="./homemed.php"><button class="button">Voltar</button></a>
        <?php
        $ouvidoria = array();
        if (file_exists('cadastros/ouvidoria/ouvidoria.json')) {
            $ouvidoria = file_get_contents('cadastros/ouvidoria/ouvidoria.json');
            $ouvidoria = json_decode($ouvidoria, true);
        } else {
            echo 'ainda não recebemos ouvidorias';
        }
        for ($i = 0; $i < count($ouvidoria); $i++) {
            $pro = $ouvidoria[$i];
            echo "<div><span>Nota do Atendimento: " . $pro["atendimento"] . "</span><br>";
            echo "<span>Descrição de melhora: " . $pro["descritivo"] . "</span><br>";
            if ($pro["feedback"] == "sim") {
                echo "<span>email do usuário: " . $pro["email"] . "</span><br>";
                echo '<form action="respostasouvidoria.php" method="post">';
                echo '<textarea name="resposta" id="resposta" cols="30" rows="10" placeholder="Responda o usuário aqui..."></textarea>';
                echo'<input type="submit" value="Enviar" class="button">';
                echo '</form>';
            } else {
                echo '<span>usuário prefere não receber feedback e não ser identificado</span><br>';
            }
            echo "</div><br>";
        }
        ?>
    </div>
</body>

</html>