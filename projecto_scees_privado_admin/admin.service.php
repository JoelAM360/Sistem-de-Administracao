<?php

    class AdminService{
        private $conn;
        private $nome;
        private $genero;
        private $email;
        private $data_nascimento;
        private $cargo;
        private $pais;
        private $senha;
        private $id;

        
        public function __construct(Conexao $conn, Admin $admin)
        {
            $this->id=$admin->__get('id');
            $this->nome=$admin->__get('nome');
            $this->genero=$admin->__get('genero');
            $this->email=$admin->__get('email');
            $this->data_nascimento=$admin->__get('data_nascimento');
            $this->cargo=$admin->__get('cargo');
            $this->pais=$admin->__get('pais');
            $this->senha=$admin->__get('senha');
            $this->conn=$conn->conectar();
        }
        public function inserir(){
            $query='INSERT INTO `tb_admin`( `nome`, `data_nascimento`, `genero`, `cargo`, `pais`, `email`, `senha`) VALUES (:nome,:dt_nascimento,:genero,:cargo,:pais,:email,:senha)';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':genero',$this->genero);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':cargo',$this->cargo);
            $stmt->bindValue(':pais',$this->pais);
            $stmt->bindValue(':dt_nascimento',$this->data_nascimento);
            $stmt->bindValue(':senha',$this->senha);

            if ( empty($this->nome) || empty($this->genero) || empty($this->email) || empty($this->cargo) || empty($this->pais) || empty($this->data_nascimento) || empty($this->senha)) {
                header('Location:home.php?q=vazio');
            } elseif ( count($this->recuperarAdminEmial()) > 0 ) {
                header('Location:home.php?q=existe');
            }
            elseif ($stmt->execute()) {
                header('Location:home.php?q=sucsess');
             } else {
                header('Location:home.php?q=erro');
             }
        }
        //Recuperar todos os Admin
        public function recuperarAdmin(){
            $query='SELECT * FROM `tb_admin`';
            $stmt=$this->conn->prepare($query);
            $stmt->execute();            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
         //Recuperar todos os Admin pelo Email para validação de Existência
         public function recuperarAdminEmial(){
            $query='SELECT * FROM `tb_admin`  WHERE `email`=:email';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':email',$this->email);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro Em recuperarAdminEmial()";
            }
        }
        //Recuperar todos os Admin pelo Id para Preencher os campos da Edição dos de Admin
        public function recuperarAdminId(){
           $query='SELECT * FROM `tb_admin`  WHERE `id`=:id';
           $stmt=$this->conn->prepare($query);
           $stmt->bindValue(':id',$this->id);
          
           if( $stmt->execute()){  
               return $stmt->fetchAll(PDO::FETCH_OBJ);
           }else {
               echo "Erro Em recuperarAdminId()";
           }
        }
       //Recuperar dados de admin, se email==email && id!=id
       public function recuperarAdminIdEmail(){
        $query='SELECT * FROM `tb_admin`  WHERE `email`=:email AND NOT `id`=:id';
        $stmt=$this->conn->prepare($query);
        $stmt->bindValue(':id',$this->id);
        $stmt->bindValue(':email',$this->email);
       
        if( $stmt->execute()){  
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else {
            echo "Erro Em recuperarAdminIdEmail()";
        }
       }
        //Editar dados do Admin
        public function atualizar(){
            $query= "UPDATE `tb_admin` SET `nome`=:nome,`data_nascimento`=:data_nascimento,`genero`=:genero,`cargo`=:cargo,`pais`=:pais,`email`=:email WHERE `id`=:id";
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':genero',$this->genero);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':cargo',$this->cargo);
            $stmt->bindValue(':pais',$this->pais);
            $stmt->bindValue(':data_nascimento',$this->data_nascimento);
            $stmt->bindValue(':id',$this->id);
            
            if ( empty($this->nome) || empty($this->genero) || empty($this->email) || empty($this->cargo) || empty($this->pais) || empty($this->data_nascimento)) {
                header('Location:home.php?q=vazio');
            } elseif( count($this->recuperarAdminIdEmail()) > 0){  
                header('Location:editar_admin.php?q=existe');
            } elseif($stmt->execute()) {
                header('Location:home.php?q=editado');
            } else {
                echo "Erro Em atualizar()";
            }
        }
        //Remover dados do Admin da BD
        public function removerAdmin(){
            $query='DELETE FROM `tb_admin` WHERE `id`=:id';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':id',$this->id);
            
            if ($stmt->execute()) {
               header('Location:home.php?q=removido');
            } else {
               header('Location:home.php?q=erro');
            }
            

        }
        
    }



?>