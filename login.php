<?php
unset($_SESSION);
session_destroy();
print_r($_SESSION);
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
    <form id="box" action="login.php" , method="POST">
        <h1>Login</h1>
        <span>E-mail</span>
        <input id="email" name="email" class="text" type="text">

        <span>Senha</span>
        <input id="password" name="password" class="text" type="password">
        <input type="submit" value="Enviar" class="button">
        <?php
        include_once('functions.php');
        $output = "";
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $conta = load($_POST);
            if ($conta != null and $_POST["email"] == $conta["email"]) {
                if (password_verify($_POST["password"], $conta["password"])) {
                    session_start();
                    $_SESSION=array();
                    $_SESSION["login"]=$conta;
                    header("Location: home.php");
                }
                else{
                    $output = "Senha inválida";
                }
            }
            elseif($_POST["email"]!=$conta["email"]) {
                    $output = "E-mail incorreto";
                }
        }
        echo $output;
        ?>
    </form>
</body>

</html>