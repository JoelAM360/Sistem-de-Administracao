<?php
    class AlunoService{
        private $conn;
        private $nome;
        private $genero;
        private $email;
        private $data_nascimento;
        private $provincia;
        private $pais;
        private $phone;
        private $endereco;
        private $area_formacao;
        private $nome_curso;
        private $id;

        
        public function __construct(Conexao $conn, Aluno $aluno)
        {
            $this->id=$aluno->__get('id');
            $this->nome=$aluno->__get('nome');
            $this->area_formacao=$aluno->__get('area_formacao');
            $this->nome_curso=$aluno->__get('nome_curso');
            $this->genero=$aluno->__get('genero');
            $this->email=$aluno->__get('email');
            $this->data_nascimento=$aluno->__get('data_nascimento');
            $this->phone=$aluno->__get('phone');
            $this->pais=$aluno->__get('pais');
            $this->provincia=$aluno->__get('provincia');
            $this->endereco=$aluno->__get('endereco');
            $this->conn=$conn->conectar();
        }
        public function inserir(){
            $query='INSERT INTO 
            `tb_aluno`(`nome_aluno`, `area_formacao`, `nome_curso`, `genero`, `email`, `data_nascimento`, `pais`, `telefone`, `endereco`, `provincia`) 
            VALUES (:nome,:area_formacao,:nome_curso,:genero,:email,:data_nascimento,:pais,:phone,:endereco,:provincia)';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':area_formacao',$this->area_formacao);
            $stmt->bindValue(':nome_curso',$this->nome_curso);
            $stmt->bindValue(':genero',$this->genero);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':provincia',$this->provincia);
            $stmt->bindValue(':pais',$this->pais);
            $stmt->bindValue(':data_nascimento',$this->data_nascimento);
            $stmt->bindValue(':endereco',$this->endereco);
            $stmt->bindValue(':phone',$this->phone);
            
            if ( empty($this->nome) || empty($this->area_formacao)  || empty($this->nome_curso) || empty($this->email) || empty($this->phone) ) {
               header("Location:cad_aluno.php?q=vazio");
            } elseif ($stmt->execute()) {
               header("Location:cad_aluno.php?q=success");
            }else {
               header("Location:cad_aluno.php?q=erro");
            }
            
        }
        //Recuperar Alunos
        public function recuperar(){
            $query='SELECT * FROM `tb_aluno`';
            $stmt=$this->conn->prepare($query);
            $stmt->execute();            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        //Recuperar todos os Aluno pelo Id para Preencher os campos da Edição dos de Admin
        public function recuperarAlunoId(){
            $query='SELECT * FROM `tb_aluno`  WHERE `id_aluno`=:id';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':id',$this->id);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro Em recuperarAlunoId()";
            }
         }
        //Recuperar dados de Aluno, se email==email && id!=id
        public function recuperarAlunoIdEmail(){
            $query='SELECT * FROM `tb_aluno`  WHERE `email`=:email AND NOT `id_aluno`=:id';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':id',$this->id);
            $stmt->bindValue(':email',$this->email);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro Em recuperarAdminIdEmail()";
            }
          }   
        // Atualizar Dados so Aluno
        public function atualizar(){
            $query = "UPDATE `tb_aluno` SET  
            `nome_aluno`=:nome,
            `genero`=:genero,
            `email`=:email,
            `provincia`=:provincia,
            `data_nascimento`=:data_nascimento,
            `pais`=:pais,
            `telefone`=:telefone,
            `endereco`=:endereco
             WHERE `id_aluno`=:id_aluno";
            
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':genero',$this->genero);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':provincia',$this->provincia);
            $stmt->bindValue(':pais',$this->pais);
            $stmt->bindValue(':data_nascimento',$this->data_nascimento);
            $stmt->bindValue(':endereco',$this->endereco);
            $stmt->bindValue(':telefone',$this->phone);
            $stmt->bindValue(':id_aluno',$this->id);

            if(count($this->recuperarAlunoIdEmail()) > 0){
                header('Location:editar_aluno.php?q=existe');
            }
            elseif ($stmt->execute()) {
               header('Location:lista_aluno.php?q=editado');
            } else {
                echo "Erro";
            }
            

        }
        public function remover(){
            $query="DELETE FROM `tb_aluno` WHERE `id_aluno`=:id";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':id',$this->id);
            
            if ($stmt->execute()) {
                header('Location:lista_aluno.php?q=removido');
            } else {
                echo "rero";
            }
            


        }
    }

    

?>