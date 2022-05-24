<?php
    require_once 'php/useradm.php';
    session_start();
?>
<?php
    include("php/SC/BBDD.php");
    require 'php/noticias.php';
    $d = new Noticia($namebd, $localbd, $dono, $senhbd);
    $das = $d -> buscatTodosIndexNot();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devise-width,initial-scale=1.0">
        <title>Segrega Device</title>
        <link rel="stylesheet" href="css/menures.css">
        <link rel="stylesheet" href="css/navegtb.css">
    </head>
    <body>
        <header class="header">
            <input type="checkbox" id="bt_menu">
            <label for="bt_menu">&#9776;</label>
            <div class="logo">
                <img src="img/logo.jpg">
            </div>
            <nav class="menu">

                <ul>
                    <?php
                        if (isset($_SESSION['id_ADM']))
                        {
                            ?>
                            <li><a href="pgs/ADM/inicioadm.php">Pagina ADM</a></li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li><a href="index.php">Home</a></li>
                            <?php
                        }
                    
                    ?>
                    <li>
                        <a href="#">Sobre</a>
                        <ul>
                            <li><a href="#">Localize-se(MAPS)</a></li>
                            <li><a href="pgs/infoprojeto.php">Projeto</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Calculos</a>
                        <ul>
                            <li><a href="pgs/energia.php">Energia</a></li>
                            <li><a href="#">Água</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Fale Conosco</a></li>
                    <?php
                        if (isset($_SESSION['id_ADM']))
                        {
                            ?>
                                <li><a href="php/exit.php">Sair</a></li>
                            <?php
                        }
                        else
                        {
                            ?>
                                <li>
                                    <a href="#">Logar</a>
                                    <ul>
                                        <li><a href="logadm.php">ADM</a></li>
                                        <li><a href="loguser.php">Usuario</a></li>
                                    </ul>
                                </li>
                            <?php
                        }
                    ?>
                </ul>

            </nav>
        </header>
        <nav class="nav_tabs">

            <ul>
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab_1" checked>
                    <label for="tab_1">Tab 1</label>
                    <div class="content">
                        <img src="img/P1.jpg" alt="">
                        <a href="index.php">
                            <h1>Plante Amor</h1>
                            <p>Plantações resultão em uma melhor qualidade de vida!</p>
                        </a>
                    </div>
                </li>
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab_2">
                    <label for="tab_2">Tab 2</label>
                    <div class="content">
                        <img src="img/P2.jpg" alt="">
                        <a href="index.php">
                            <h1>O perigo da Seca</h1>
                            <p>A seca esta asolando e prejuizo ambiental esta crescendo!</p>
                        </a>
                    </div>
                </li>
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab_3">
                    <label for="tab_3">Tab 3</label>
                    <div class="content">
                        <img src="img/P3.jpg" alt="">
                        <a href="index.php">
                            <h1>Meio Ambiente e Tecnologia</h1>
                            <p>A tecnologia vem ajudado e influenciando a nova era do meio ambiente!</p>
                        </a>
                    </div>
                </li>
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab_4">
                    <label for="tab_4">Tab 4</label>
                    <div class="content">
                        <img src="img/P4.jpg" alt="">
                        <a href="P4.php">
                            <h1>Alagamento</h1>
                            <p>Alagamentos causam prejuizos em varios pontos...</p>
                        </a>
                    </div>
                </li>
            </ul>

        </nav>
        
        <div class="newst">
            <h1>Noticias</br>Indices com as noticias no brasil e do mundo</h1> 
            <section class="features">

                <div id="news1">
                    <?php
                    
                        $data = new DateTime($das[0]['dia']);
                        if ($das[0]['titulo'] == 'nulo')
                        {
                            # code...
                            ?> <a href="#"><img src="img/Noticias/sem-foto.jpg" width="150" height="360"></a> <?php
                            ?> <h3>Sem Noticia</h3> <?php
                            ?>  <p>Ultima atualização no dia <?php echo $data->format('d/m/Y')."!"; ?></p> <?php
                            ?> <h4><?php echo $das[0]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                        else
                        {
                            ?> <a href="pgs/apresentnot.php?id_not=<?php echo $das[0]['titulo'];?>"><img src="img/Noticias/Not/<?php echo $das[0]['imagem_capa']; ?>" width="300" height="360"></a> <?php
                            ?> <h3><?php echo $das[0]['titulo']; ?></h3> <?php
                            ?>  <p><?php echo $das[0]['pretexto']; ?></p> <?php
                            ?> <h4><?php echo $das[0]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                    
                    ?>                                     
                </div>

                <div id="news2">
                    <?php
                        
                        $data = new DateTime($das[1]['dia']);
                        if ($das[1]['titulo'] == 'nulo')
                        {
                            # code...
                            ?> <a href="#"><img src="img/Noticias/sem-foto.jpg" width="150" height="360"></a> <?php
                            ?> <h3>Sem Noticia</h3> <?php
                            ?>  <p>Ultima atualização no dia <?php echo $data->format('d/m/Y')."!"; ?></p> <?php
                            ?> <h4><?php echo $das[1]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                        else
                        {
                            ?> <a href="pgs/apresentnot.php?id_not=<?php echo $das[1]['titulo'];?>"><img src="img/Noticias/Not/<?php echo $das[1]['imagem_capa']; ?>" width="300" height="360"></a> <?php
                            ?> <h3><?php echo $das[1]['titulo']; ?></h3> <?php
                            ?>  <p><?php echo $das[1]['pretexto']; ?></p> <?php
                            ?> <h4><?php echo $das[1]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                    
                    ?>   
                </div>
                
                <div id="news3">
                    <?php
                        
                        $data = new DateTime($das[2]['dia']);
                        if ($das[2]['titulo'] == 'nulo')
                        {
                            # code...
                            ?> <a href="#"><img src="img/Noticias/sem-foto.jpg" width="150" height="360"></a> <?php
                            ?> <h3>Sem Noticia</h3> <?php
                            ?>  <p>Ultima atualização no dia <?php echo $data->format('d/m/Y')."!"; ?></p> <?php
                            ?> <h4><?php echo $das[2]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                        else
                        {
                            ?> <a href="pgs/apresentnot.php?id_not=<?php echo $das[2]['titulo'];?>"><img src="img/Noticias/Not/<?php echo $das[2]['imagem_capa']; ?>" width="300" height="360"></a> <?php
                            ?> <h3><?php echo $das[2]['titulo']; ?></h3> <?php
                            ?>  <p><?php echo $das[2]['pretexto']; ?></p> <?php
                            ?> <h4><?php echo $das[2]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                    
                    ?>   
                </div>

                <div id="news4">
                    <?php
                        
                        $data = new DateTime($das[3]['dia']);
                        if ($das[3]['titulo'] == 'nulo')
                        {
                            # code...
                            ?> <a href="#"><img src="img/Noticias/sem-foto.jpg" width="150" height="360"></a> <?php
                            ?> <h3>Sem Noticia</h3> <?php
                            ?>  <p>Ultima atualização no dia <?php echo $data->format('d/m/Y')."!"; ?></p> <?php
                            ?> <h4><?php echo $das[3]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                        else
                        {
                            ?> <a href="pgs/apresentnot.php?id_not=<?php echo $das[3]['titulo'];?>"><img src="img/Noticias/Not/<?php echo $das[3]['imagem_capa']; ?>" width="300" height="360"></a> <?php
                            ?> <h3><?php echo $das[3]['titulo']; ?></h3> <?php
                            ?>  <p><?php echo $das[3]['pretexto']; ?></p> <?php
                            ?> <h4><?php echo $das[3]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4> <?php
                        }
                    
                    ?>   
                </div>
            </section>
            <a href="pgs/apresentnot.php?id_not=todas" id="td">Todas as noticias</a>
        </div>

        <footer id="rodape">

            <div class="ids">
                <h1>Links Relacionados</h1>
                <ul>
                    <li><a href="#">Engenharia ambiental</a></li>
                    <li><a href="#">Desafios na engenharia</a></li>
                    <li><a href="#">Meio Ambiente</a></li>
                </ul>
            </div>
            <div class="agradecer">
                <h1>Idealizadores do Projeto</h1><br>
                <ul>
                    <li>Professor: albert einstein</li>
                    <li>Aluno: Adolf Hitler</li>
                    <li>Aluno: Osama bin laden</li>
                </ul>
            </div>

        </footer>
        <div class="fim">
            <p>Copyright &copy; 2020 - By MaiaDeveloper <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a></p>
        </div>

    </body>
</html> 