<?php
    class Aluno{
        private $id;
        private $nome;
        private $genero;
        private $email;
        private $data_nascimento;
        private $pais;
        private $phone;
        private $provincia;
        private $area_formacao;
        private $nome_curso;
        private $endereco;
         
        public function __set($attr, $valor)
        {
            $this->$attr=$valor;
        }
        public function __get($attr){
            return $this->$attr;
        }
    }

?>