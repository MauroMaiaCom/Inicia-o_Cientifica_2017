<?php

class Useradm
{
    private $pdo;

    // --------------Construtor---------------

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

    // --------------Cadastrar----------------
    /*
    public function Cadastrar($nome, $email, $senha)
    {
        // Verificar se ja esta Cadastrado
        $cmd = $this -> pdo -> prepare("SELECT id FROM ussadm WHERE email = :e");
        $cmd -> bindValue(":e", $email);
        $cmd -> execute();

        if ($cmd -> rowCount() >0)
        {
            return false;
        }
        else //Nao veio ID  
        {
            // Cadastrar
            $cmd = $this -> pdo -> prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $cmd -> bindValue(":n", $nome);
            $cmd -> bindValue(":e", $email);
            $cmd -> bindValue(":s", md5($senha));
            $cmd -> execute();
            return true;
        }
    }*/

    // --------------Logar--------------------
    public function Logar($nick, $senha)
    {
        $cmd = $this -> pdo -> prepare("SELECT * FROM ussadm WHERE nick = :e AND senha = :s");
        $cmd -> bindValue(":e", $nick);
        $cmd -> bindValue(":s", md5($senha));
        $cmd -> execute();

        if ($cmd -> rowCount() >0) //se foi encontrado essa pessoa
        {
            $dados = $cmd -> fetch();
            session_start();
            $_SESSION['id_ADM'] = $dados['id_usuario'];
            return true; //encontrado
        }
        else
        {
            return false; //nao encontrado
        }
    }

    // --------------DADOS--------------------
    public function buscarDadosUser($id)
    {
        $cmd = $this -> pdo -> prepare("SELECT * FROM ussadm WHERE id_usuario = :id");
        $cmd -> bindValue(":id", $id);
        $cmd -> execute();

        $dados = $cmd -> fetch();
        return $dados;
    }
}

?>