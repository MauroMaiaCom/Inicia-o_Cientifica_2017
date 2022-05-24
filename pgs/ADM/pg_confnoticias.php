<?php
    include("../../php/SC/BBDD.php");
    require '../../php/noticias.php';
    $t = new Noticia($namebd, $localbd, $dono, $senhbd);
    $p = new Noticia($namebd, $localbd, $dono, $senhbd);
    session_start();
    if (!isset($_SESSION['id_ADM']))
    {
        header("location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devise-width,initial-scale=1.0">
        <title>S.D. - ADM</title>
        <link rel="stylesheet" href="../../css/menures.css">
        <link rel="stylesheet" href="../../css/pg_confnoticias.css">
        <style>
            body{
                background-image: url("../../img/fundo_tela_2.jpg");
                background-size: cover;
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
                        <li>
                            <a href="#">Voltar</a>
                            <ul>
                                <li><a href="../../index.php">Home Page</a></li>
                                <li><a href="inicioadm.php">PG_inicial ADM</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Conf. News</a>
                            <ul>
                                <li><a href="#">Cadastrar ADM's</a></li>
                                <li><a href="#">Mapa</a></li>
                                <li><a href="#">Noticias</a></li>
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

                <nav class="nav_tabs">

                    <ul>
                        <li>
                            <input type="radio" name="tabs" class="rd_tabs" id="tab_1">
                            <label for="tab_1">Nova Notícia</label>
                            <div class="content">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="cp_1">
                                        <label for="titulo">Titulo da Noticia</label>
                                        <input type="text" name="titulo" id="titulo" autocomplete="off">
                                        <label for="pretexto">Pré Texto Sobre a Noticia</label>
                                        <textarea name="pretexto" id="tx1" cols="50" rows="5"></textarea>
                                        <label for="texto">Primeiro Parágrafo da Noticia</label>
                                        <textarea name="texto" id="tx2" cols="80" rows="10"></textarea>
                                        <label for="fotocapa">Selecione uma capa para a capa da noticia <br><br> 
                                        <input type="file" name="fotocapa"  id="fotocapa"></label>
                                    </div>

                                    <div class="cp_2">
                                        <div id="P1">
                                            <label for="opc_1">Segundo paragrafo?</label>
                                            <input type="radio" id="not1" name="opc_1" value="nao" checked>
                                            <label for="not1">Não</label>
                                            <input type="radio" id="not2" name="opc_1" value="sim">
                                            <label for="not2">Sim</label>
                                        </div>
                                        <div id="P2">
                                            <label for="texto2">Segundo Parágrafo da Noticia</label>
                                            <textarea name="texto2" id="tx3" cols="60" rows="5"></textarea>
                                            <label for="foto2">Selecione uma foto para o meio da noticia <br><br> <input type="file" name="foto2"  id="foto2"></label>
                                        </div>
                                    </div>

                                    <div class="cp_3">
                                        <div id="P3">
                                            <label for="opc_2">Apresentar essa Noticia na tela inicial?</label>
                                            <input type="radio" id="not3" name="opc_2" value="sim" checked>
                                            <label for="not3">Sim</label>
                                            <input type="radio" id="not4" name="opc_2" value="nao">
                                            <label for="not4">Não</label>
                                        </div>
                                        <div id="P4">
                                            <label for="indnot">Escolha onde Será apresentada:</label>
                                            <input type="radio" id="not5" name="indnot" value="01">
                                            <label for="not5">noticia 1</label>
                                            <input type="radio" id="not6" name="indnot" value="02">
                                            <label for="not6">Noticia 2</label>
                                            <input type="radio" id="not7" name="indnot" value="03">
                                            <label for="not7">Noticia 3</label>
                                            <input type="radio" id="not8" name="indnot" value="04">
                                            <label for="not8">Noticia 4</label>
                                        </div>
                                    </div>

                                    <input type="submit" value="Enviar">
                                </form>

                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" class="rd_tabs" id="tab_2">
                            <label for="tab_2">Todas as Notícias</label>
                            <div class="content">
                                
                                <?php
                                
                                    $dadosP = $t -> buscarNoticias();
                                    if (count($dadosP) > 0)
                                    {
                                        //var_dump($dadosP);

                                        foreach ($dadosP as $v)
                                        {
                                            # code...
                                            ?>
                                                <div class="area-comentario">
                                                    <a href="#">
                                                    <img src="../../img/Noticias/Not/<?php echo $v['imagem_capa']; ?>">
                                                    <h3>
                                                        <?php
                                                            echo $v['titulo'];
                                                        ?>
                                                    </h3>
                                                    </a>
                                                    <h4>
                                                        <?php
                                                            $data = new DateTime($v['dia']);

                                                            echo $v['horario'] . " -- " . $data->format('d/m/Y');
                                                        ?>
                                                    
                                                        <a href="pg_confnoticias.php?id_exc=<?php echo $v['id_noticias']; ?>"> Excluir </a>
                                    
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
                                        ?>                
                                            <p class="mensagem">Erro com a busca de dados</p>
                                        <?php
                                    }
                                    
                                ?>

                            </div>
                        </li>
                    </ul>

                </nav>

            </header>
        </div>
    </body>
</html>

<?php

    if (isset($_POST['titulo']))
    {
        if (empty($_POST['indnot']))
        {
            $_POST['indnot'] = 'nulo';
        }

        $titulo = htmlentities(addslashes($_POST['titulo']));
        $pretexto = htmlentities(addslashes($_POST['pretexto']));
        $pr_parag = htmlentities(addslashes($_POST['texto']));
        $sg_parag = htmlentities(addslashes($_POST['texto2']));

        $opcao_1 = $_POST['opc_1'];
        $opcao_2 = $_POST['opc_2'];
        $opcao_3 = $_POST['indnot'];


        if (!empty($titulo) && !empty($pretexto) && !empty($pr_parag))
        {
            if (!empty($_FILES['fotocapa']['name']))
            {
                $nome_arquivo = md5($_FILES['fotocapa']['name'] . rand(1,900)) . ".jpg";
                move_uploaded_file($_FILES['fotocapa']['tmp_name'], "../../img/Noticias/Not/" . $nome_arquivo);

                $img_cp= $nome_arquivo;

                
               if ($opcao_1 == 'nao')
                {
                    if ($opcao_2 == 'nao')
                    {
                        $sg_parag = 'nulo';
                        $pg_apre = 'nulo';
                        $img_po = 'nulo';
                        # code...

                        $t -> inserirNoticias($titulo, $pretexto, $pr_parag, $sg_parag, $pg_apre, $img_cp, $img_po);

                        ?>
                            <script type="text/javascript">
                                alert("Noticia Cadastrada com Sucesso!!");
                                alert("Não tem os campos segundo paragrafo e não tem a opção de apresentar na pagina principal");
                            </script>
                        <?php
                    }
                    elseif($opcao_3 == 'nulo')
                    {
                        ?>

                            <script type="text/javascript">
                                alert("Ação incorreta!");
                                alert("Veja no fundo da pagina qual foi o erro");
                            </script>

                            <p class="mensagem">Voce não marcou a opção:<br>Escolha em qual posição a noticia ira ficar</p>
                        <?php
                    }
                    else
                    {
                        $sg_parag = 'nulo';
                        $img_po = 'nulo';

                        $pg_apre = $_POST['indnot'];

                        $t -> inserirNoticias($titulo, $pretexto, $pr_parag, $sg_parag, $pg_apre, $img_cp, $img_po);

                        $p -> inserirIndexNot($pg_apre, $titulo, $pretexto, $img_cp);

                        ?>
                            <script type="text/javascript">
                                alert("Noticia Cadastrada com Sucesso!!");
                                alert("Não tem os campos segundo paragrafo e será apresentada na tela principal");
                            </script>
                        <?php
                    }
                }
                else
                {
                    if (!empty($sg_parag) && !empty($_FILES['foto2']['name']))
                    {
                        # code...
                        $nome_arquivo_2 = md5($_FILES['foto2']['name'] . rand(1,900)) . ".jpg";
                        move_uploaded_file($_FILES['foto2']['tmp_name'], "../../img/Noticias/Not/" . $nome_arquivo_2);

                        $img_po= $nome_arquivo_2;



                        if ($opcao_2 == 'nao')
                        {
                            $pg_apre = 'nulo';
                            
                            # code...

                            $t -> inserirNoticias($titulo, $pretexto, $pr_parag, $sg_parag, $pg_apre, $img_cp, $img_po);

                            ?>
                                <script type="text/javascript">
                                    alert("Noticia Cadastrada com Sucesso!!");
                                    alert("Não tem a opção de apresentar na pagina principal");
                                </script>
                            <?php
                        }
                        elseif($opcao_3 == 'nulo')
                        {
                            ?>

                                <script type="text/javascript">
                                    alert("Ação incorreta!");
                                    alert("Veja no fundo da pagina qual foi o erro");
                                </script>

                                <p class="mensagem">Voce não marcou a opção:<br>Escolha em qual posição a noticia ira ficar</p>
                            <?php
                        }
                        else
                        {

                            $pg_apre = $_POST['indnot'];

                            $t -> inserirNoticias($titulo, $pretexto, $pr_parag, $sg_parag, $pg_apre, $img_cp, $img_po);

                            $p -> inserirIndexNot($pg_apre, $titulo, $pretexto, $img_cp);

                            ?>
                                <script type="text/javascript">
                                    alert("Noticia Cadastrada com Sucesso!!");
                                </script>
                            <?php
                        }

                    }
                    else
                    {
                        ?>

                            <script type="text/javascript">
                                alert("Ação incorreta!");
                                alert("Veja no fundo da pagina qual foi o erro");
                            </script>

                            <p class="mensagem">Voçe escolheu um segundo paragrafo.<br>Campos, segundo paragrafo e foto do meio da noticia OBRIGATORIOS!!</p>
                        <?php
                    }

                }                

            }
            else
            {
                ?>

                <script type="text/javascript">
                    alert("Ação incorreta!");
                    alert("Veja no fundo da pagina qual foi o erro");
                </script>

                    <p class="mensagem">Insira uma capa para a capa da Noticia</p>
                <?php
            }
        }
        else
        {
            ?>

                <script type="text/javascript">
                    alert("Ação incorreta!");
                    alert("Veja no fundo da pagina qual foi o erro");
                </script>

                <p class="mensagem">Campos Titulo, Pré Texto e Primeiro Paragrafo, são obrigatorios.<br>Preencha Todos os Campos!!</p>
            <?php
        }
    }

?>


<?php

    //pegar id de exclusao
    if (isset($_GET['id_exc']))
    {
        $id_e = addslashes($_GET['id_exc']);

        $notn = $t->buscarTit($id_e);

        $notm = $p->buscarIndexNot($notn['pg_apre']);

        /*
        var_dump($id_e) . "</br>";
        var_dump($notn) . "</br>";
        echo $notn['titulo'] . "</br>";
        echo $notn['pg_apre'] . "</br>";
        var_dump($notm) . "</br>";
        echo $notm['titulo'] . "</br>";
        echo $notm['imagem_capa'] . "</br>";
        */


        if ($notn['titulo'] == $notm['titulo'])
        {
            $deln = $t -> excluirNoticias($id_e);
            $delin = $p -> zerarIndexNot($notn['pg_apre']);
        }
        else
        {
            $deln = $t -> excluirNoticias($id_e);
        }


                                          
        echo "<script>document.location='pg_confnoticias.php'</script>";
    }
?>