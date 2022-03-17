<?php
include_once('functions.php');
session_destroy();

/**
 * CHECA OS DADOS E SALVA A CONTA
 */
if (!empty($_POST)) {
    if($_POST["nome"] == ""){
        $output="Coloque o nome";
    }
    elseif($_POST["date"] == ""){
        $output="Coloque a data";
    }
    elseif($_POST["email"] == ""){
        $output="Coleque o email";
    }
    elseif($_POST["password"] == ""){
        $output="Coloque a senha";
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $output = "Email inválido.";
    }
    elseif (strlen($_POST["password"]) < 8) {
        $output="Senha deve possuir no mínimo 8 caracteres.";
    }
    elseif($_POST["cliente"]==""){
        $output="Selecione seu tipo de conta";
    }
    else{
        if (save($_POST)) {
            header("Location: login.php");
        }
        else {
            $output = "Não foi possível cadastrar";
        }        
    };
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <form id="box" action="cadastro.php" method="POST">
        <h1>Cadastre-se aqui</h1>
        <span>Nome</span>
        <input id="nome" name="nome" class="text" type="text">
        <span>Data de Nascimento</span>
        <input id="date" name="date" class="text" type="date">
        <span>E-mail</span>
        <input id="email" name="email" class="text" type="text">
        <span>Senha</span>
        <input id="password" name="password" class="text" type="password">
        <span>Você é?</span>
        <div>
        <label><input type="radio" name="cliente" value="medico">Médico</label>
        <label><input type="radio" name="cliente" value="paciente">Paciente</label>
        </div>
        <?php

        $button = '<input type="submit" value="Enviar" class="button">';
        echo $button;
        echo $output;
        ?>
    </form>
</body>

</html>