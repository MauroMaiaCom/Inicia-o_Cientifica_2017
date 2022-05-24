<?php

date_default_timezone_set('America/Sao_Paulo');

class Noticia
{
    private $pdo;

    public function __construct($dbname, $host, $usuario, $senha)
    {
        try
        {
            $this -> pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
        }
        catch (PDOException $e)
        {
            echo "Erro com o Banco de Dados: ".$e->getMessage();
        }
        catch (Exception $e)
        {
            echo "Erro: ".$e->getMessage();
        }
    }

    public function inserirNoticias($titulo, $pretexto, $pr_parag, $sg_parag, $pg_apre, $img_cp, $img_po)
    {
        $cmd = $this->pdo->prepare("SELECT * FROM noticias WHERE titulo = :t");
        $cmd -> bindValue(":t", $titulo);
        $cmd -> execute();

        if ($cmd -> rowCount() > 0)
        {
            return false;
        }
        else
        {
            $cmd = $this->pdo->prepare("INSERT INTO noticias (titulo, pretexto, pr_parag, sg_parag, pg_apre, dia, horario) VALUES (:t, :pt, :pr, :sg, :pg, :d, :h)");
            $cmd -> bindValue(":t", $titulo);
            $cmd -> bindValue(":pt", $pretexto);
            $cmd -> bindValue(":pr", $pr_parag);
            $cmd -> bindValue(":sg", $sg_parag);
            $cmd -> bindValue(":pg", $pg_apre);
            $cmd -> bindValue(":d",  date('Y-m-d'));
            $cmd -> bindValue(":h", date('H:i'));
            $cmd -> execute();

            $id_produto = $this->pdo->lastInsertId();

            
            $cmdf = $this->pdo->prepare("INSERT INTO imagens (imagem_capa, imagem_corpo, fk_id_noticias) VALUES (:im, :ig, :fk)");
            $cmdf -> bindValue(":im", $img_cp);
            $cmdf -> bindValue(":ig", $img_po);
            $cmdf -> bindValue(":fk", $id_produto);
            $cmdf -> execute();

        }
    }

    public function inserirIndexNot($pg_apre, $titulo, $pretexto, $img_cp)
    {
        $cmd = $this->pdo->prepare("UPDATE indnot 
        set titulo = :t, pretexto = :pt, imagem_capa = :ic, dia = :d, horario = :h
        WHERE id = :id");
        $cmd -> bindValue(":t", $titulo);
        $cmd -> bindValue(":pt", $pretexto);
        $cmd -> bindValue(":ic", $img_cp);
        $cmd -> bindValue(":d",  date('Y-m-d'));
        $cmd -> bindValue(":h", date('H:i'));
        $cmd -> bindValue(":id", $pg_apre);
        $cmd -> execute();
    }

    public function buscarNoticias()
    {
        $cmd = $this->pdo->prepare('SELECT *,
        (SELECT imagem_capa from imagens where fk_id_noticias = noticias . id_noticias) as imagem_capa
         FROM noticias');
         $cmd -> execute();
         if($cmd->rowCount() > 0)
         {
             $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
         }
         else
         {
             $dados = array();
         }
         return $dados;
    }
    public function buscarNoticiasDois($nid)
    {
        $cmd = $this->pdo->prepare('SELECT *,
        (SELECT imagem_corpo from imagens where fk_id_noticias = noticias . id_noticias) as imagem_corpo
         FROM noticias where id_noticias = :hh');
         $cmd -> bindValue(":hh", $nid);
         $cmd -> execute();
         if($cmd->rowCount() > 0)
         {
             $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
         }
         else
         {
             $dados = array();
         }
         return $dados;
    }
    public function buscarTit($id)
    {
        $cmd = $this->pdo->prepare("SELECT titulo, pg_apre FROM noticias WHERE id_noticias = :id");
        $cmd -> bindValue(":id", $id);
        $cmd -> execute();
        $dados = $cmd -> fetch();
        return $dados;
    }
    public function buscarIndexNot($ds)
    {
        $cmd = $this->pdo->prepare("SELECT titulo, imagem_capa FROM indnot WHERE id = :dd");
        $cmd -> bindValue(":dd", $ds);
        $cmd -> execute();
        $dad = $cmd -> fetch();
        return $dad;
    }

    public function buscatTodosIndexNot()
    {
        $cmd = $this->pdo->prepare("SELECT * FROM indnot");
        $cmd -> execute();
        $dados = $cmd -> fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }


    public function zerarIndexNot($ii)
    {
        $cmd = $this->pdo->prepare("UPDATE indnot 
        set titulo = :t, pretexto = :pt, imagem_capa = :ic, dia = :d, horario = :h
        WHERE id = :id");
        $cmd -> bindValue(":t", 'nulo');
        $cmd -> bindValue(":pt", 'nulo');
        $cmd -> bindValue(":ic", 'nulo');
        $cmd -> bindValue(":d",  date('Y-m-d'));
        $cmd -> bindValue(":h", date('H:i'));
        $cmd -> bindValue(":id", $ii);
        $cmd -> execute();
    }
    public function excluirNoticias($id_e)
    {

        $cmd = $this->pdo->prepare("DELETE FROM noticias WHERE id_noticias = :id_c");
        $cmd -> bindValue(":id_c", $id_e);
        $cmd -> execute();        
    }
}


?>