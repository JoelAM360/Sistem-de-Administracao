<?php

class AdminCursoService{

    private $conn;
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

    public function __construct(Conexao $conn, AdminCursoModel $curso)
    {
        $this->id_curso=$curso->__get('id_curso');
        $this->nome_curso=$curso->__get('nome_curso');
        $this->data_inic=$curso->__get('data_inic');
        $this->data_fim=$curso->__get('data_fim');
        $this->preco=$curso->__get('preco');
        $this->turno=$curso->__get('turno');
        $this->carga_horaria=$curso->__get('carga_horaria');
        $this->descricao=$curso->__get('descricao');
        $this->area_formacao=$curso->__get('area_formacao');
        $this->vagas=$curso->__get('vagas');
        $this->img_curso=$curso->__get('img_curso');
        $this->conn=$conn->conectar();

    }
    
    //Inserir Curso
    public function inserirCurso(){
        
        //Armazenando os valores um suas variaveis
        $img_name = $this->img_curso['name'];
        $img_erro = $this->img_curso['error'];
        $img_size = $this->img_curso['size'];
        $tmp_name = $this->img_curso['tmp_name'];
   
       //Verficar se ñ há nenhum erro
       if ($img_erro === 0) {
           //Pegar extensões e guardar:
           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);       
           //Converter para minuscula:
           $img_ex_lc = strtolower($img_ex);
           //Array de extensões validas e validar extensões
           $array_exs = array('jpg', 'jpeg', 'png');       
           if (in_array($img_ex_lc,$array_exs)) {
            //Renomear Img com a extensão
            $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
            $this->img_curso = $new_img_name;

            $query='INSERT INTO  `tb_curso`(  `nome_curso`, `area_formacao`, `data_inic`, `data_fim`, `preco`,  `vagas`, `carga_horaria`,`turno`, `descricao`,`img_curso`) VALUES (:nome_curso,:area_formacao,:data_inic,:data_fim,:preco,:vagas,:carga_horaria,:turno,:descricao,:img_curso)';
        
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome_curso',$this->nome_curso);
            $stmt->bindValue(':area_formacao',$this->area_formacao);
            $stmt->bindValue(':data_inic',$this->data_inic);
            $stmt->bindValue(':data_fim',$this->data_fim);
            $stmt->bindValue(':preco',$this->preco);
            $stmt->bindValue(':vagas',$this->vagas);
            $stmt->bindValue(':carga_horaria',$this->carga_horaria);
            $stmt->bindValue(':turno',$this->turno);  
            $stmt->bindValue(':descricao',$this->descricao);
            $stmt->bindValue(':img_curso',$this->img_curso);
        
            if ( empty($this->nome_curso) || empty($this->area_formacao) || empty($this->data_inic) || empty($this->data_fim) || empty($this->preco) || empty($this->vagas) || empty($this->carga_horaria) || empty($this->turno) || empty($this->descricao)) {
                header('Location:cad_cursos.php?q=vazio');
            } elseif ( count($this->recuperarCursoNome()) > 0 ) {
                header('Location:cad_cursos.php?q=existe');
            }
            elseif ($stmt->execute()) {
                header('Location:cad_cursos.php?q=sucsess');
                //Mover uma pasta no APP:
                move_uploaded_file($tmp_name, 'dist/img/cursos/'.$new_img_name); 
            } else {
               header('Location:cad_cursos.php?q=erro');
            }
                       
        }
       }      
     /* */
    }
    //Recuperar todos os Curso
    public function recuperarCurso(){
        $query='SELECT * FROM `tb_curso`';
        $stmt=$this->conn->prepare($query);
        $stmt->execute();            
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //Recuperar todos os Curso pelo Email para validação de Existência
    public function recuperarCursoArea(){
        $query='SELECT nome_curso FROM `tb_curso`  WHERE `area_formacao`=:area_formacao';
        $stmt=$this->conn->prepare($query);
        $stmt->bindValue(':area_formacao',$this->area_formacao);
       
        if( $stmt->execute()){  
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
    //Recuperar todos os Curso pelo Email para validação de Existência
    public function recuperarCursoNome(){
        $query='SELECT * FROM `tb_curso`  WHERE `nome_curso`=:nome_curso';
        $stmt=$this->conn->prepare($query);
        $stmt->bindValue(':nome_curso',$this->nome_curso);
       
        if( $stmt->execute()){  
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
    //Recuperar todos os Curso pelo Id para validação de Existência
    public function recuperarCursoId(){
        $query='SELECT * FROM `tb_curso`  WHERE `id_curso`=:id_curso';
        $stmt=$this->conn->prepare($query);
        $stmt->bindValue(':id_curso',$this->id_curso);
       
        if( $stmt->execute()){  
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
    //Recuperar dados de Curso, se nome==nome && id!=id
    public function recuperarCursosIdNome(){
     $query='SELECT * FROM `tb_curso`  WHERE `nome_curso`=:nome_curso AND NOT `id_curso`=:id_curso';
     $stmt=$this->conn->prepare($query);
     $stmt->bindValue(':id_curso',$this->id_curso);
     $stmt->bindValue(':nome_curso',$this->nome_curso);
    
     if( $stmt->execute()){  
         return $stmt->fetchAll(PDO::FETCH_OBJ);
     }else {
         echo "Erro Em recuperarCursosIdNome()";
     }
    }
    //Editar dados do Curso
    public function atualizarCurso() {
        //Armazenando os valores um suas variaveis
        $img_name = $this->img_curso['name'];
        $img_erro = $this->img_curso['error'];
        $img_size = $this->img_curso['size'];
        $tmp_name = $this->img_curso['tmp_name'];
   
       //Verficar se ñ há nenhum erro
       if ($img_erro === 0) {
           //Pegar extensões e guardar:
           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);       
           //Converter para minuscula:
           $img_ex_lc = strtolower($img_ex);
           //Array de extensões validas e validar extensões
           $array_exs = array('jpg', 'jpeg', 'png');       
           if (in_array($img_ex_lc,$array_exs)) {
            //Renomear Img com a extensão
            $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
            $this->img_curso = $new_img_name;

            $query= "UPDATE `tb_curso` SET 
            `nome_curso`=:nome_curso,
            `area_formacao`=:area_formacao,
            `data_inic`=:data_inic,
            `data_fim`=:data_fim,
            `preco`=:preco,
            `vagas`=:vagas,
            `carga_horaria`=:carga_horaria,
            `turno`=:turno,
            `descricao`=:descricao,
            `img_curso`=:img_curso
             WHERE `id_curso`=:id_curso";
    
            $stmt=$this->conn->prepare($query);
            $stmt->bindValue(':nome_curso',$this->nome_curso);
            $stmt->bindValue(':area_formacao',$this->area_formacao);
            $stmt->bindValue(':data_inic',$this->data_inic);
            $stmt->bindValue(':data_fim',$this->data_fim);
            $stmt->bindValue(':preco',$this->preco);
            $stmt->bindValue(':vagas',$this->vagas);
            $stmt->bindValue(':carga_horaria',$this->carga_horaria);
            $stmt->bindValue(':turno',$this->turno);  
            $stmt->bindValue(':descricao',$this->descricao);
            $stmt->bindValue(':img_curso',$this->img_curso); 
            $stmt->bindValue(':id_curso',$this->id_curso);      
    
            if ( empty($this->nome_curso) || empty($this->area_formacao) || empty($this->data_inic) || empty($this->data_fim) || empty($this->preco) || empty($this->vagas) || empty($this->carga_horaria) || empty($this->turno) || empty($this->descricao)) {
                header('Location:cad_cursos.php?q=vazio');
            } elseif( count($this->recuperarCursosIdNome()) > 0){  
                header('Location:editar_curso.php?q=existe');
            } elseif($stmt->execute()) {
                //Remove Img já existente da pasta
                unlink('dist/img/cursos/'.$_SESSION['curso'][0]->img_curso);

                //Mover uma pasta no APP:
                move_uploaded_file($tmp_name, 'dist/img/cursos/'.$new_img_name);
                header('Location:lista_curso.php?q=editado');

            } else {
                echo "Erro Em atualizar()";
            }
         }
        }
    }
    //Remover dados do Admin da BD
    public function removerCurso(){
        $query='DELETE FROM `tb_curso` WHERE `id_curso`=:id_curso';
        $stmt=$this->conn->prepare($query);
        $stmt->bindValue(':id_curso',$this->id_curso);
        
        if ($stmt->execute()) {
           header('Location:lista_curso.php?q=removido');
        } else {
           header('Location:lista_curso.php?q=erro');
        }
        
    }


}
?>