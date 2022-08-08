<?php
    class AdminContatoService{
        private $id_user;
        private $id_mgs;
        private $nome_user;
        private $email;
        private $data_envio;
        private $n_telefone;
        private $qtd_msg;
        private $msg;


        public function __construct(Conexao $conn, AdminContato $contacto)
        {
            $this->id_user=$contacto->__get('id_user');
            $this->id_mgs=$contacto->__get('id_mgs');
            $this->nome_user=$contacto->__get('nome_user');
            $this->email=$contacto->__get('email');
            $this->data_envio=$contacto->__get('data_envio');
            $this->n_telefone=$contacto->__get('n_telefone');
            $this->qtd_msg=$contacto->__get('qtd_msg');
            $this->msg=$contacto->__get('msg');
            $this->conn=$conn->conectar();
    
        }
           
        //Cadastrando User Contato(Quem contacta o admin!)
        public function inserirUserContacto(){
          
           $query="INSERT INTO `tb_user`(`nome_user`, `email`, `n_telefone`) VALUES (:nome_user,:email,:n_telefone)";
           $stmt=$this->conn->prepare($query);

           $stmt->bindValue(':nome_user',$this->nome_user);
           $stmt->bindValue(':email',$this->email);
           $stmt->bindValue(':n_telefone',$this->n_telefone);
            
           if ( empty($this->nome_user) || empty($this->email) || empty($this->n_telefone)) {
              echo "Vazio";
           } elseif ( count($this->recuperarUserContatoEmial()) > 0 ) {
              echo "Já existe";
              $id_user=$this->recuperarUserContatoEmial()[0]->id_user;              
              $this->inserirMessage($id_user,$this->msg);
             header('Location:index.php?q=ok');
          }
          elseif ($stmt->execute()) {
             echo "Sucesso no envio";
             $id_user=$this->recuperarUserContatoEmial()[0]->id_user;
             $this->inserirMessage($id_user,$this->msg);

             header('Location:index.php?q=ok');
          } else {
              //header('Location:home.php?q=erro');
              echo "Erro";
           }
        }
        //Envio de Mensagem para o Admin:
        function inserirMessage($id_user, $msg) {
            $query ="INSERT INTO `tb_contato`(`id_user`, `msg`) VALUES (:id_user,:msg)";
            $stmt=$this->conn->prepare($query);
            
            $stmt->bindValue(':id_user',$id_user);
            $stmt->bindValue(':msg',$msg);

            if ( empty($msg) || empty($id_user)) {
              echo "Vazio Message";
            } elseif ($stmt->execute()) {
                return "Sucesso Message";
            }else{
                echo "Erro2";
            }
        }
        //Recuperar dados da Tb_User para listagem
        function recuperarUserMgs(){
            $query="SELECT * FROM `tb_user`";
            
            $stmt=$this->conn->prepare($query);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro";
            }   
        }
        //Recuperar dados da Tb_Contacto e Contar quantidade msg enviadas, pelos seu Id
        function recuperarUserMgsID(){

            $query='SELECT * FROM `tb_contato`  WHERE `id_user`=:id_user';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':id_user', $this->id_user);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro1";
            }   
        }
        //Recuperar User por Email para fins de Validação
        //E insersaõ de Id_user no momento de envio da msg ao admin
        function recuperarUserContatoEmial(){

            $query='SELECT * FROM `tb_user`  WHERE `email`=:email';
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':email',$this->email);
           
            if( $stmt->execute()){  
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }else {
                echo "Erro";
            }   
        }
    }

?>