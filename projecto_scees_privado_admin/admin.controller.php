<?php 

    session_start();

    require 'admin.curso.model.php';
    require 'admin.curso.service.php';
    require 'admin.contacto.model.php';
    require 'admin.contacto.service.php';
    require 'admin.model.php';
    require 'admin.service.php';
    require 'conexao.php';
    
    $acao=isset($_GET['acao'])?$_GET['acao']:'recuperar';

    //Inserir Admin na BD
    if ($acao=='inserir') {
        $conn=new Conexao();
        $admin=new Admin();
        //Recebendo da dados do Formulário
        $admin->__set('nome',$_POST['name']);
        $admin->__set('genero',$_POST['genero']);
        $admin->__set('email',$_POST['email']);
        $admin->__set('data_nascimento',$_POST['data_nascimento']);
        $admin->__set('cargo',$_POST['cargo']);
        $admin->__set('pais',$_POST['pais']);
        $admin->__set('senha',$_POST['senha']);
       
        //Enviando dados para banco de dados
        $admin_service=new AdminService($conn, $admin);
        $admin_service->inserir();
        
    } 
    // Recuperar Todos os Admin e Listar
    elseif ($acao=='recuperar') {
      $conn=new Conexao();
      $admin=new Admin();
      $curso=new AdminCursoModel();

     //Lista Admin
      $admin_service=new AdminService($conn, $admin);
      $service=$admin_service->recuperarAdmin();

     //Lista Cursos
      $curso_service=new AdminCursoService($conn, $curso);
      $service_curso = $curso_service->recuperarCurso();
     // Lista de User Msg
     $contacto=new AdminContato();

     $contacto_service=new AdminContatoService($conn, $contacto);
     $list_contato = $contacto_service->recuperarUserMgs();
     /*echo "<pre>";
     print_r($contacto_service->recuperarUserMgs());
     echo "</pre>";*/
    } 
    //Remover Admin
    elseif ($acao=='remover') {
      $conn=new Conexao();
      $admin=new Admin();
      $admin->__set('id',$_GET['id']);
      $admin_service=new AdminService($conn, $admin);      
      $admin_service->removerAdmin();
      
    } 
    //Editar Admin
    elseif ($acao=='editar') {
      $conn=new Conexao();
      $admin=new Admin();

      if (isset($_GET['rota']) && $_GET['rota']=='sim') {

        $admin->__set('id',$_GET['id']);
        $admin_service=new AdminService($conn, $admin);
        $_SESSION['admin'] =$admin_service->recuperarAdminId();
        //print_r($_SESSION['admin']);
        header("Location:editar_admin.php");

      } else {

        //Recebendo da dados do Formulário
         $admin->__set('nome',$_POST['name']);
         $admin->__set('genero',$_POST['genero']);
         $admin->__set('email',$_POST['email']);
         $admin->__set('data_nascimento',$_POST['data_nascimento']);
         $admin->__set('cargo',$_POST['cargo']);
         $admin->__set('pais',$_POST['pais']);
         //$admin->__set('senha',$_POST['senha']);
         $admin->__set('id',$_POST['id']);
         $admin_service=new AdminService($conn, $admin);
         $admin_service->atualizar();
          
      }
    }elseif ($acao == "cad_curso") {

      $conn=new Conexao();
      $curso=new AdminCursoModel();
      //Recebendo da dados do Formulário
      $curso->__set('nome_curso',$_POST['nome_curso']);
      $curso->__set('area_formacao',$_POST['area_formacao']);
      $curso->__set('data_inic',$_POST['data_inic']);
      $curso->__set('data_fim',$_POST['data_fim']);
      $curso->__set('preco',$_POST['preco']);
      $curso->__set('vagas',$_POST['vagas']);
      $curso->__set('carga_horaria',$_POST['carga_horaria']);
      $curso->__set('turno',$_POST['turno']);
      $curso->__set('descricao',$_POST['descricao']);
      $curso->__set('img_curso',$_FILES['img_curso']);


      $curso_service=new AdminCursoService($conn, $curso);
      $curso_service->inserirCurso();
  
    }elseif ( $acao =='editar_curso') {
      $conn=new Conexao();
      $curso=new AdminCursoModel();

      if (isset($_GET['rotas']) && $_GET['rotas']=="curso") {
        
         $curso->__set('id_curso',$_GET['id']);
         $curso_service=new AdminCursoService($conn, $curso);
         $_SESSION['curso'] =$curso_service->recuperarCursoId();
         
         header("Location:editar_curso.php");
     }else {

      //Recebendo da dados do Formulário
      $curso->__set('nome_curso',$_POST['nome_curso']);
      $curso->__set('area_formacao',$_POST['area_formacao']);
      $curso->__set('data_inic',$_POST['data_inic']);
      $curso->__set('data_fim',$_POST['data_fim']);
      $curso->__set('preco',$_POST['preco']);
      $curso->__set('vagas',$_POST['vagas']);
      $curso->__set('carga_horaria',$_POST['carga_horaria']);
      $curso->__set('turno',$_POST['turno']);
      $curso->__set('descricao',$_POST['descricao']);
      $curso->__set('img_curso',$_FILES['img_curso']);
      $curso->__set('id_curso',$_POST['id']);

      $curso_service=new AdminCursoService($conn, $curso);
      $curso_service->atualizarCurso();
     }

    } elseif ($acao == "remover_curso") {
       $conn=new Conexao();
       $curso=new AdminCursoModel();

       $curso->__set('id_curso',$_GET['id']);

       $curso_service=new AdminCursoService($conn, $curso);
       $curso_service->removerCurso();
    } elseif ($acao == "recuperar_curso") {

      $conn=new Conexao();
      $curso=new AdminCursoModel();

      $curso->__set('area_formacao',$_GET['area_formacao']);

      $curso_service=new AdminCursoService($conn, $curso);
      $cursos = $curso_service->recuperarCursoArea();
      
      echo "<option value=''>Selecione o Curso</option>";
      foreach ($cursos as $value) {
        echo "<option>".$value->nome_curso."</option>";
      }
    } elseif($acao == "contacto") {

      $conn=new Conexao();
      $contacto=new AdminContato();

      $contacto->__set('nome_user',$_POST['nome']);
      $contacto->__set('email',$_POST['email']);
      $contacto->__set('n_telefone',$_POST['telefone']);
      $contacto->__set('msg',$_POST['message']);
     /* echo "<pre>";
      print_r($recuperarUserMgs());
      echo "</pre>";*/

      $contacto_service=new AdminContatoService($conn, $contacto);

      $contacto_service->inserirUserContacto();

    } elseif ($acao == "contato_msg") {
      $conn=new Conexao();
      $contacto=new AdminContato();

      $contacto->__set('id_user',$_GET['id']);

      $contacto_service=new AdminContatoService($conn, $contacto);
      $msg = $contacto_service->recuperarUserMgsID();
      require_once "chat_contato.php";
    }

?>