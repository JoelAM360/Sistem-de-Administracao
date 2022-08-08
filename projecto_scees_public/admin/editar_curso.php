<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Usuários - CINFOTEC</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini" onload="selectAutoOption('<?= $_SESSION['curso'][0]->turno?>','turno'), selectAutoOption('<?= $_SESSION['curso'][0]->area_formacao?>','area_formacao') ">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">CINFOTEC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">CINFOTEC</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Fulano Junior</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  Fulano Junior - Web Developer
                  <small>Membro desde Abr. 2018</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Fulano Junior</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

       <!-- Sidebar Menu -->
       <ul class="navbar navbar-expand-lg sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="home.php"><i class="fa fa-user" aria-hidden="true"></i> <span>Admin</span></a></li>
        <li class=""><a href="lista_aluno.php"><i class="fa fa-table" aria-hidden="true"></i> <span>Lista dos Alunos</span></a></li>
        <li class=""><a href="cad_aluno.php"><i class="fa fa-users"></i><span>Pré-Inscrição de Alunos</span></a></li>
        <li class=""><a href="lista_curso.php"><i class="fa fa-list" aria-hidden="true"></i> <span>Cursos Disponíveis</span></a></li>
        <li class="active"><a href="cad_cursos.php"><i class="fa fa-users"></i><span>Cadastrar Curso</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuários
        <small>Gerenciamento de usuários do sistema</small>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

   
      <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Novo Usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action='admin.controller.php?acao=editar_curso' enctype="multipart/form-data" method='post' name="form_cad">
              <div class="box-body">
                <fieldset>
                  <legend>Editar Dados Cursos : </legend>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Curso</label><span style="color: red;">*</span>
                      <input type="text" name="nome_curso" value="<?= $_SESSION['curso'][0]->nome_curso?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Área de formação</label><span style="color: red;">*</span>
                      <select name="area_formacao" id="area_formacao" class="form-control">
                        <option value="">Selecione a Área de Formação</option>
                        <option value="1">Transporte Logisteco Desenvolvimento Organizacional e Serviços - TLDOS</option>
                        <option value="2">Electronicidade e Energias Renováveis - EER</option>
                        <option value="3">Tecnologia de Informação e Comunicação - TIC´s</option>
                        <option value="4">Mecânica Industrial e Automóvel - MIA</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Data Inicio</label><span style="color: red;">*</span>
                      <input type="date"  name="data_inic" value="<?= $_SESSION['curso'][0]->data_inic?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Data Encerramento</label><span style="color: red;">*</span>
                      <input type="date"  name="data_fim" value="<?= $_SESSION['curso'][0]->data_fim?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Imagem do Curso</label>
                      <input type="file" name="img_curso" class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Turno</label><span style="color: red;">*</span>
                      <select name="turno" id="turno" class="form-control">
                        <option value="">Selecione o turno</option>
                        <option>Manhã</option>
                        <option>Tarde</option>
                        <option>Manhã/Tarde</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Vagas Disponiveis</label>
                      <input type="number" name="vagas" class="form-control" value="<?= $_SESSION['curso'][0]->vagas?>" placeholder="ex. Nome da Rua, 56 Bloco 2, Ap 301">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Preço</label><span style="color: red;">*</span>
                      <input type="number" name="preco" value="<?= $_SESSION['curso'][0]->preco?>" placeholder="50.000,00 Kz"  class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Carga Horária</label>
                      <input type="number" name="carga_horaria" value="<?= $_SESSION['curso'][0]->carga_horaria?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="hidden" name="id" value="<?= $_SESSION['curso'][0]->id_curso?>" class="form-control">
                    </div>
                    <div class="form-group col-md-7">
                      <label>Descrição do Curso</label><span style="color: red;">*</span>
                      <textarea name="descricao" rows="7" placeholder="Descreva as informações relevantes sobre o curso..." class="form-control"><?= $_SESSION['curso'][0]->descricao?></textarea>
                    </div>
                  </div>
                  
                </fieldset> 
                
              </div>
              <!-- /.box-body -->          
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
              </div>
            </form>
          </div>

        
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <!-- Default to the left -->
    Projeto desenvolvido por Joel A. Malamba e Leonel D. L. Diogo. <br>
    Os campos com (<span style="color: red;">*</span>) são obrigatórios
  </footer>

</div>
<script src="bower_components/bootstrap/dist/js/jquery-3.2.1.slim.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Function.js-->
<script src="dist/js/function.js"></script>


</body>
</html>