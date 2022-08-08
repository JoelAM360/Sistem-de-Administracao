<?php 
    session_start();

    require 'aluno.model.php';
    require 'aluno.service.php';
    require 'conexao.php';
    
    $acao=isset($_GET['acao'])?$_GET['acao']:'recuperar';
    if ($acao=='inserir') {

        $conn=new Conexao();
        $aluno=new Aluno();
        //Recebendo da dados do Formulário
        $aluno->__set('nome',$_POST['nome']);
        $aluno->__set('genero',$_POST['genero']);
        $aluno->__set('email',$_POST['email']);
        $aluno->__set('data_nascimento',$_POST['data_nascimento']);
        $aluno->__set('provincia',$_POST['provincia']);
        $aluno->__set('pais',$_POST['pais']);
        $aluno->__set('phone',$_POST['phone1']);
        $aluno->__set('endereco',$_POST['endereco']);
        $aluno->__set('area_formacao',$_POST['area_formacao']);
        $aluno->__set('nome_curso',$_POST['nome_curso']);
        
        //Enviando dados para banco de dados
        $aluno_service=new AlunoService($conn, $aluno);
        $aluno_service->inserir();

    }  elseif ($acao=='recuperar') {
      $conn=new Conexao();
      $admin=new Aluno();
      $admin_service=new AlunoService($conn, $admin);
      $service=$admin_service->recuperar();

      
    
    }elseif ($acao=='remover') {
      $conn=new Conexao();
      $aluno=new Aluno();
      $aluno->__set('id',$_GET['id']);
      $aluno_service=new AlunoService($conn, $aluno);      
      $aluno_service->remover();
      
      //
    }elseif ($acao=='editar') {
      $conn=new Conexao();
      $aluno=new Aluno();
      
      if (isset($_GET['rotas']) && $_GET['rotas']=='sim') {

        $aluno->__set('id',$_GET['id']);

        $aluno_service=new AlunoService($conn, $aluno);
        $_SESSION['aluno'] =$aluno_service->recuperarAlunoId();
        header("Location:editar_aluno.php");

      } else {

         //Recebendo da dados do Formulário
         $aluno->__set('nome',$_POST['nome']);
         $aluno->__set('genero',$_POST['genero']);
         $aluno->__set('email',$_POST['email']);
         $aluno->__set('data_nascimento',$_POST['data_nascimento']);
         $aluno->__set('provincia',$_POST['provincia']);
         $aluno->__set('pais',$_POST['pais']);
         $aluno->__set('phone',$_POST['phone1']);
         $aluno->__set('endereco',$_POST['endereco']);
         $aluno->__set('area_formacao',$_POST['area_formacao']);
         $aluno->__set('nome_curso',$_POST['nome_curso']);
         $aluno->__set('id',$_POST['id']);

         $aluno_service=new AlunoService($conn, $aluno);
         $aluno_service->atualizar();
        
      }
    
    }
     

?>