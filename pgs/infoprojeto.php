<?php
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
        <link rel="stylesheet" href="../css/confinfor.css">
        <style>
            body
            {
                background-image: none;
                background-color: rgba(0, 0, 0, .5);
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

        <div class="info">

            <h1>Projeto Segrega Devise</h1>
            <h2>Conscientização para preservação do mundo!</h2>
            <img src="../img/terra.png" alt="">
            <P>A conscientização ambiental é a transformação e a criação de senso crítico em relação ao prejuízos sofridos pelo meio ambiente devido à sua exploração sem cuidados pelos seres humanos desde os tempos mais primórdios da humanidade.<br><br>Desde o início da humanidade o ser humano necessitou do ambiente para sobreviver, utilizando todos os seus recursos para conseguir abrigo e alimento. Essa relação era harmoniosa mas, com o passar dos séculos, ele foi desenvolvendo-se de tal forma que a exploração aos recursos naturais ficou cada vez mais preocupante, principalmente no final do século XX.<br><br>No século XX houve um acelerado crescimento populacional, também um grande desenvolvimento dos adventos tecnológicos. Isso fez com que a relação perdesse seu equilíbrio, fazendo com que fosse necessário pensar sobre a preservação do meio ambiente juntamente com os interesses econômicos e sociais do país, ou seja, pensar em um desenvolvimento sustentável.<br><br>Com isso, surgiram normas ambientais que se tornam cada vez mais severas, métodos de produção e de energia cada vez mais sustentáveis e todas as atividades diárias desempenhadas pensando na economia de recursos naturais.</P>
            <img src="../img/terra.jpg" alt="">
            <p>Mesmo que a conscientização ambiental seja um processo introspectivo, que necessita do próprio indivíduo adquirir tais pensamentos, há métodos legislativos e educacionais que visam tentar acelerar esse processo, seja por meio de cartilhas, avisos, artigos, ou até por punições instituídas e estudadas pelo Direito Ambiental.</p>

        </div>
    </body>
</html>