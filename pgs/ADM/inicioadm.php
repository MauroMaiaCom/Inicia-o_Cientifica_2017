<?php
    include("../../php/SC/BBDD.php");
    session_start();
    if (!isset($_SESSION['id_ADM']))
    {
        header("location: ../../index.php");
    }
?>
<?php
    require_once '../../php/useradm.php';
    if (isset($_SESSION['id_ADM']))
    {
        $us = new Useradm($namebd, $localbd, $dono, $senhbd);
        $infos = $us -> buscarDadosUser($_SESSION['id_ADM']);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devise-width,initial-scale=1.0">
        <title>S.D. - ADM</title>
        <link rel="stylesheet" href="../../css/menures.css">
        <style>
            body{
                background-image: url("../../img/fundo_tela_adm.jpg");
                background-position: block;
                background-size: 100%;
            }
            h1
            {
                background-color: silver;
                text-align: center;
                padding: 50px;
                margin: 200px;
            }
        </style>
    </head>
    <body>
        <div id="adm">
            <header class="header">
                <input type="checkbox" id="bt_menu">
                <label for="bt_menu">&#9776;</label>
                <div class="logo">
                    <img src="../../img/logo.jpg">
                </div>
                <nav class="menu">

                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <li>
                            <a href="#">Conf. News</a>
                            <ul>
                                <li><a href="#">Cadastrar ADM's</a></li>
                                <li><a href="#">Mapa</a></li>
                                <li><a href="pg_confnoticias.php">Noticias</a></li>
                                <li><a href="#">Outdor</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Conf. Calculos</a>
                            <ul>
                                <li><a href="#">Energia</a></li>
                                <li><a href="#">Água</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Mensagens</a></li>
                        <li>
                            <a href="../../php/exit.php">Sair</a>
                        </li>
                    </ul>

                </nav>

            </header>
            <h1>
                <?php
                    echo "Olá ";
                    echo $infos['nome'];
                    echo " !</br></br>Seja Bem Vindo(a)!!";
                ?>
            </h1>
        </div>
    </body>
</html>