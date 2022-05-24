<?php
    include("php/SC/BBDD.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Loguin ADM</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/logadm.css">
    </head>

    <body>
        <span>Mauro Maia<br>MaiaDeveloper</span>
        <form method="POST">
            <h1>Área Administrativa</h1>
            <img src="img/email.png" alt="">
            <input type="text" name="nick" autocomplete="off" maxlength="10">
            <img src="img/cadeado.png" alt="">
            <input type="password" name="senha">
            <input type="submit" value="ENTRAR">
            <a href="index.php">Voltar para Home</a>

        </form>
    </body>
</html>

<?php

    if (isset($_POST['nick']))
    {
        $nick = htmlentities(addslashes($_POST['nick']));
        $senha = htmlentities(addslashes($_POST['senha']));

        if (!empty($nick) && !empty($senha))
        {
            require_once 'php/useradm.php';
            $us = new Useradm($namebd, $localbd, $dono, $senhbd);

            if ($us -> Logar($nick, $senha))
            {
                header("location: pgs/ADM/inicioadm.php");
            }
            else
            {
                ?>
                    <p class="mensagem">nick e/ou senha Incorretos poha !!</p>
                <?php
            }
        }
        else
        {
            ?>
                <p class="mensagem">Preencha Todos os Campos!!</p>
            <?php
        }
    }

?>