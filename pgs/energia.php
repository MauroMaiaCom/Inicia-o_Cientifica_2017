<?php
    include("../php/SC/BBDD.php");
    require '../php/noticias.php';
    require_once '../php/useradm.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devise-width,initial-scale=1.0">
        <title>Segrega Device</title>
        <link rel="stylesheet" href="../css/menures.css">
        <link rel="stylesheet" href="../css/energia.css">
        <style>
            body
            {
                background-image: none;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <header class="header">
            <input type="checkbox" id="bt_menu">
            <label for="bt_menu">&#9776;</label>
            <div class="logo">
                <img src="../img/logo.jpg">
            </div>
            <nav class="menu">

                <ul>
                    <?php
                        if (isset($_SESSION['id_ADM']))
                        {
                            ?>
                            <li>
                                <a href="#">Voltar</a>
                                <ul>
                                    <li><a href="../index.php">Home Page</a></li>
                                    <li><a href="ADM/inicioadm.php">PG_inicial ADM</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li><a href="../index.php">Home</a></li>
                            <?php
                        }
                    
                    ?>
                    <li>
                        <a href="#">Sobre</a>
                        <ul>
                            <li><a href="#">Localize-se(MAPS)</a></li>
                            <li><a href="infoprojeto.php">Projeto</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Calculos</a>
                        <ul>
                            <li><a href="energia.php">Energia</a></li>
                            <li><a href="#">Água</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Fale Conosco</a></li>
                    <?php
                        if (isset($_SESSION['id_ADM']))
                        {
                            ?>
                                <li><a href="../php/exit.php">Sair</a></li>
                            <?php
                        }
                        else
                        {
                            ?>
                                <li>
                                    <a href="#">Logar</a>
                                    <ul>
                                        <li><a href="../logadm.php">ADM</a></li>
                                        <li><a href="../loguser.php">Usuario</a></li>
                                    </ul>
                                </li>
                            <?php
                        }
                    ?>
                </ul>

            </nav>
        </header>
        <div class="corpo">
            <h1>Calculo do Consumo Medio de Energia</h1>
            <p>Esse é um calculo preliminar para confirmação do uso de energia em sua residencia. <br> O metodo de cobrança e tarifas variam de estado para estado. Como os dados que voce irá informar, o uso total de energia em uma residencia apresenta varias variaveis que não podem ser expressas em um sisples questionario. <br> Por isso o resultado que será apresentado aqui é apenas uma estimativa do uso na sua residencia.</p>
            <form method="POST" enctype="multipart/form-data">
                <div class="cp_1">                
                    <fieldset class="lampada">
                        <legend>Lampadas</legend><br>
                        <label>Quantas lampadas tem na sua residencia?</label><br>
                        <input type="number" name="qt_lp" min="1" max="25" required><br><br>

                        <label>Qual o tipo delas?</label><br>
                        <select id="tp_lp" name="tp_lp" required>
                            <option value="halogena">Halogena</option> 
                            <option value="Led">Led</option>
                            <option value="Fluorescente">fluorescentes</option>
                        </select><br><br>

                        <label>Quanto tempo elas ficam ligadas por Dia?</label><br>
                        <input type="number" name="temp_lp" min="1" max="1440" required>
                        <select id="op_temp_lp" name="op_temp_lp">
                            <option value="minuto">Minutos</option> 
                            <option value="hora">Horas</option>
                        </select><br><br>
                    </fieldset><br>

                    <fieldset class="Televisor">
                        <legend>Televisor</legend><br>
                        <label>Quantas TV's tem na sua residencia?</label><br>
                        <input type="number" name="qt_tv" min="1" max="5"><br><br>

                        <label>Quanto tempo elas ficam ligadas por Dia?</label><br>
                        <input type="number" name="temp_tv" min="1" max="1440">
                        <select id="op_temp_tv" name="op_temp_tv">
                            <option value="minuto">Minutos</option> 
                            <option value="hora">Horas</option>
                        </select><br><br>
                    </fieldset>                
                </div>

                <div class="cp_2">
                    <fieldset class="arcond">
                        <legend>Ar-condicionado</legend><br>
                        <label>Quantos Ar-condicionados tem na sua residencia?</label><br>
                        <input type="number" name="qt_arc" min="0" max="5"><br><br>

                        <label>Quanto tempo elas ficam ligadas por Dia?</label><br>
                        <input type="number" name="temp_arc" min="1" max="1440">
                        <select id="op_temp_arc" name="op_temp_arc">
                            <option value="minuto">Minutos</option> 
                            <option value="hora">Horas</option>
                        </select><br><br>
                    </fieldset><br>

                    <fieldset class="lavar">
                        <legend>Lavadoura de Roupas</legend><br>
                        <label>Voçe possui maquina de lavar roupas em sua residencia?</label><br>
                        <select id="lavar_possui" name="lavar_possui">
                            <option value="sim">Sim</option> 
                            <option value="nao">Não</option>
                        </select><br><br>

                        <label>Quanto tempo ela fica ligada por Dia?</label><br>
                        <input type="number" name="temp_lv" min="1" max="1440">
                        <select id="op_temp_lavar" name="op_temp_lavar">
                            <option value="minuto">Minutos</option> 
                            <option value="hora">Horas</option>
                        </select><br><br>
                    </fieldset>
                </div>

                <div class="botao">

                    <fieldset class="Dados">
                        <legend>Dados Pessoais</legend><br>
                        <label>Em qual Cidade voçe Reside:</label><br>
                        <select id="cidade" name="cidade" required>
                            <option value="">Escolha</option> 
                            <option value="salvador">Salvador</option> 
                            <option value="sao paulo">São Paulo</option>
                        </select><br><br>
                    </fieldset>


                    <input type="submit" value="Enviar">
                    
                </div>
            </form>
            <div class="mostra">

            <?php

                if (isset($_POST['qt_lp']))
                {
                    # code...
                    $qtlamp = $_POST['qt_lp'];
                    $tipolamp = $_POST['tp_lp'];
                    $qtTPlamp = $_POST['temp_lp'];
                    $TPtempolamp = $_POST['op_temp_lp'];


                    $qtTv = $_POST['qt_tv'];
                    $qtTPtv = $_POST['temp_tv'];
                    $TPtempotv = $_POST['op_temp_tv'];


                    $qtAr = $_POST['qt_arc'];
                    $qtTPar = $_POST['temp_arc'];
                    $TPtempoar = $_POST['op_temp_arc'];


                    $qtLv = $_POST['lavar_possui'];
                    $qtTPlv = $_POST['temp_lv'];
                    $TPtempolv = $_POST['op_temp_lavar'];

                    $cidd = $_POST['cidade'];


                    ?>
                    <h3><?php echo "Dadas as informações:"; ?></h3><br>
                    <h3><?php echo "Quantidades de Lampadas ----------------- ".$qtlamp; ?></h3><br>
                    <h3><?php echo "Tipo das Lampadas -------------------------- ".$tipolamp; ?></h3><br>
                    <h3><?php echo "Tempo ligadas -------------------------------- ".$qtTPlamp." ".$TPtempolamp; ?></h3><br><br>
                    <h3><?php echo "Quantidade(s) de TV's ---------------------- ".$qtTv; ?></h3><br>
                    <h3><?php echo "Tempo de Funcionamento ----------------- ".$qtTPtv." ".$TPtempotv; ?></h3><br><br>
                    <h3><?php echo "Quantidade(s) de Ar-condicionado ------ ".$qtAr; ?></h3><br>
                    <h3><?php echo "Tempo de Funcionamento ----------------- ".$qtTPar." ".$TPtempoar; ?></h3><br>
                    <h3><?php echo "Possui Maquina de Lavar ------------------ ".$qtLv; ?></h3><br>
                    <h3><?php echo "Tempo de Funcionamento ------------------ ".$qtTPlv." ".$TPtempolv; ?></h3><br><br><br>
                    <h3><?php echo "Na cidade de ------------------------------- ".$cidd; ?></h3><br><br><br><br>
                    <?php

                    /*
                    ?> <h4><?php echo $qtlamp . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $tipolamp . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtTPlamp . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtTv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtTPtv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $TPtempotv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtAr . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtTPar . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $TPtempoar . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtLv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $qtTPlv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $TPtempolv . "<br>"; ?></h4><?php
                    ?> <h4><?php echo $cidd . "<br>"; ?></h4><?php
                    */
                }

                ?>

            </div>

            <br><br>
            <h4>Salvador -- 30/08/2020</h4>
        </div>
    </body>
</html>