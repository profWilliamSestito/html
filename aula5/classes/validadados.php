<?php

    Class Usuario{

        private $pdo;
        public $msgerro;

        //Metodo para Conectar o banco ao sistema de login.
        public function conectar($dbname, $host, $user, $passwd)
        {
            global $pdo;
            try
            {
                $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$passwd);
            }
            catch(PDOException $e){
                $msgerro = $e->getMessage();
            }
        }
        //Metodo para cadastrar novo usuario

        public function cadastrar($nome, $email, $senha)
        {
            global $pdo;

            // verificar se o usuario ja esta cadastrado no banco
            $sql = $pdo->prepare("SELECT id_user FROM tb_usuario WHERE email = :u");
            $sql->bindValue(":u",$email);
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                return false; //porque usuario ja esta cadastrado
            }
            else
            {
                $sql = $pdo->prepare("INSERT INTO tb_usuario (nome_user, email, senha)
                VALUES (:u, :n, :s)");
                $sql->bindValue(":u",$nome);
                $sql->bindValue(":n",$email);
                $sql->bindValue(":s",sha1($senha));
                $sql->execute();

                return true; //Usuario foi inserido no banco com sucesso
            }
        }

        public function logar($email, $senha)
        {
            global $pdo;
            $sql = $pdo->prepare("SELECT * FROM tb_usuario WHERE email = :n AND senha = :s");
            $sql->bindValue(":n",$email);
            $sql->bindValue(":s",sha1($senha));
            $sql->execute();

            if($sql->rowCount()>0)
            {
                //criar uma sessão de usuarios
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id_user'] = $dado['id_user'];
                $_SESSION['nome_user'] = $dado['nome_user'];
                
                return true; //o usuario esta logado no sistema.
            }
            else
            {
                return false; //usuario nao esta logado
            }
        }
    }
?>