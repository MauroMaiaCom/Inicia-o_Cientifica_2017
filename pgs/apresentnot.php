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
        <link rel="stylesheet" href="../css/confaprenot.css">
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
        <div class="infm">
            <?php
                $bb = new Noticia($namebd, $localbd, $dono, $senhbd);
                $dnw = $bb->buscarNoticias();
               

                //pegar id de exclusao
                if (isset($_GET['id_not']))
                {
                    $id_e = htmlentities(addslashes($_GET['id_not']));

                    if ($id_e == "todas")
                    {

                        # code...
                        foreach ($dnw as $v)
                        {
                            # code...
                            ?>
                                <div class="info">
                                    <img src="../img/Noticias/Not/<?php echo $v['imagem_capa']; ?>" width="100" height="80">
                                    <h3>
                                        <?php
                                            echo $v['titulo'];
                                        ?>
                                    </h3>
                                    <h4>
                                        <?php
                                            $data = new DateTime($v['dia']);

                                            echo $v['horario'] . " -- " . $data->format('d/m/Y');
                                        ?>
                                    
                                        <a href="apresentnot.php?id_not=<?php echo $v['titulo']; ?>"> Ver Noticia </a>
                    
                                    </h4>
                                    <p>
                                        <?php
                                            echo $v['pretexto'];
                                        ?>
                                    </p>
                                </div>
                            <?php
                        }
                    }
                    else
                    {
                        for ($i=0; $i <= count($dnw) ; $i++)
                        { 
                            # code...
                            if ($dnw[$i]['titulo'] == $id_e)
                            {
                                # code...
                                $data = new DateTime($dnw[$i]['dia']);
                                ?>
                                    <div class="megk">
                                        <h1><?php echo $dnw[$i]['titulo'];?></h1>
                                        <h2><?php echo $dnw[$i]['pretexto'];?></h2>
                                        <img src="../img/Noticias/Not/<?php echo $dnw[$i]['imagem_capa']?>" alt="">
                                        <p id="p1"><?php echo $dnw[$i]['pr_parag'];?></p>
                                        <?php
                                        if ($dnw[$i]['sg_parag'] == 'nulo')
                                        {
                                            # code...
                                            goto nice;
                                        }
                                        else
                                        {
                                            $hy = $dnw[$i]['id_noticias'];
                                            $sgn = $bb->buscarNoticiasDois($hy);
                                            ?><img src="../img/Noticias/Not/<?php echo $sgn[0]['imagem_corpo']?>" alt=""><?php
                                            ?><p id="p2"><?php echo $sgn[0]['sg_parag'];?></p><?php
                                        }
                                        nice:
                                        ?>
                                        <h4><?php echo $dnw[$i]['horario']; ?> -- <?php echo $data->format('d/m/Y');?></h4>
                                        <a href="apresentnot.php?id_not=todas"> Todas as Noticias </a>
                                    </div>
                                <?php
                                
                                $i = count($dnw);
                                goto end;
                            }
                            else
                            {
                                goto ctn;
                            }
                            ctn:
                        }


                        ?>

                            <script type="text/javascript">
                                alert("Ação incorreta sua...");
                            </script>

                            <p class="mensagem">Conteudo não encontrado!</p>
                        <?php

                        end:


                        /*
                        var_dump($dnw);
                        echo "</br>";
                        echo count($dnw);
                        echo "</br>";
                        echo $id_e ."</br>" ;
                        //echo $dnw[0]['titulo'];
                        
                        for ($i=0; $i <= count($dnw) ; $i++) { 
                            # code...
                            if ($dnw[$i]['titulo'] == $id_e)
                            {
                                # code...
                                echo $dnw[$i]['titulo'];
                                $i = count($dnw);
                            }
                        }
                        
                        $key = array_search('ccccccc', $dnw['titulo']);
                        echo $key;
                        
                        foreach ($dnw['titulo'] as $va) {
                            echo $va;
                        }
                        /*
                        ?>
                            <div class="info_2">
                                <?php
                                echo $id_e;
                                var_dump($dnw);
                                echo "</br>";
                                echo "</br>";
                                echo "</br>";
                                echo "</br>";
                                echo "</br>";
                                var_dump($wnd);
                                ?>
                            </div>
                        <?php
                        */
                    }


                    
                    /*
                    $notn = $p->buscarTit($id_e);

                    $notm = $p->buscarIndexNot($notn['pg_apre']);

                    
                    var_dump($id_e) . "</br>";
                    var_dump($notn) . "</br>";
                    echo $notn['titulo'] . "</br>";
                    echo $notn['pg_apre'] . "</br>";
                    var_dump($notm) . "</br>";
                    echo $notm['titulo'] . "</br>";
                    echo $notm['imagem_capa'] . "</br>";
                    


                    if ($notn['titulo'] == $notm['titulo'])
                    {
                        $deln = $p -> excluirNoticias($id_e);
                        $delin = $p -> zerarIndexNot($notn['pg_apre']);
                    }
                    else
                    {
                        $deln = $p -> excluirNoticias($id_e);
                    }
                    */

                                                    
                    //echo "<script>document.location='pg_confnoticias.php'</script>";
                }
            ?>
        </div>
    </body>
</html>