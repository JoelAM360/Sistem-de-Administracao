<?php
    class AdminCursoModel{
        
        private $id_curso;
        private $nome_curso;
        private $data_inic;
        private $data_fim;
        private $preco;
        private $turno;
        private $carga_horaria;
        private $descricao;
        private $area_formacao;
        private $vagas;
        private $img_curso;
        
        public function __set($attr, $valor)
        {
            $this->$attr=$valor;
        }
        public function __get($attr){
            return $this->$attr;
        }
    }

?>