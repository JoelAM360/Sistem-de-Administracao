<?php
    class Conexao{
        private $dsn='mysql:host=localhost;dbname=pessoa';
        private $user='root';
        private $pass='';

        public function conectar()
        {
            try {
                $conexao=new PDO("$this->dsn","$this->user","$this->pass");
                return $conexao;
            } catch (PDOException $erro) {
                echo '<p>'.$erro->getMessage().'</p>';
            }
        }
    }

?>