<!DOCTYPE html>
<?php require 'aluno.controller.php';
 
?>
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

<body class="hold-transition skin-blue sidebar-mini">
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
      <li class="active"><a href="lista_aluno.php"><i class="fa fa-table" aria-hidden="true"></i> <span>Lista dos Alunos</span></a></li>
      <li class=""><a href="cad_aluno.php"><i class="fa fa-users"></i><span>Pré-Inscrição de Alunos</span></a></li>
      <li class=""><a href="lista_curso.php"><i class="fa fa-list" aria-hidden="true"></i> <span>Cursos Disponíveis</span></a></li>
      <li class=""><a href="cad_cursos.php"><i class="fa fa-users"></i><span>Cadastrar Curso</span></a></li>
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
      </h1>
      <ol class="breadcrumb">
            <input type="text" style="padding: 3px; padding-left: 10px;"  placeholder="Pesquisar">
            <a href="" class="btn btn-outline-success">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transporte Logisteco Desenvolvimento Organizacional e Serviços - TLDOS</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">Foto</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>E-mail</th>
                    <th>Nº Phone</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($service as $value) {?>
                  <?php if($value->area_formacao == 1) {?>
                  <tr>
                    <td><img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm"></td>
                    <td><?= $value->nome_aluno ?></td>
                    <td><?= $value->nome_curso ?></td>
                    <td><?= $value->email ?></td>
                    <td><?= $value->telefone ?></td>
                    <td>
                      <a href="aluno.controller.php?id=<?= $value->id_aluno ?>&rotas=sim&acao=editar" class="btn btn-primary btn-xs btn-flat">Editar</a>
                      <button type="button"  class="btn btn-danger btn-xs btn-flat" id="teste" onclick="pegar(<?=$value->id_aluno?>,'<?=$value->nome_aluno?>')" data-toggle="modal" data-target="#myModal_<?=$value->id_aluno?>">Excluir</button>
                         <!-- The Modal -->
                         <div class="modal" id="myModal_<?=$value->id_aluno?>">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Excluir</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                  Deseja realmente excluir o/a admin <b><span id="nome_admin"><?= $value->nome_aluno ?></span>?</b>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                  <a href="aluno.controller.php?acao=remover&id=<?=$value->id_aluno?>"  class="btn btn-success">Sim</a>
                                </div>

                              </div>
                            </div>
                         </div>
                    

                    </td>
                  </tr>
                  <?php } ?> 
                  <?php } ?> 
                </tbody>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>

        </div>

    </section>
    <!-- /.content --><!-- Main content -->
    <section class="content container-fluid">

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Electronicidade e Energias Renováveis - EER</h3>
      </div>
      <!-- /.box-header -->
      
      <div class="box-body no-padding">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Curso</th>
              <th>E-mail</th>
              <th>Nº Phone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($service as $value) {?>
            <?php if($value->area_formacao == 2) {?>
            <tr>
              <td><img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm"></td>
              <td><?= $value->nome_aluno ?></td>
              <td><?= $value->nome_curso ?></td>
              <td><?= $value->email ?></td>
              <td><?= $value->telefone ?></td>              
              <td>
                <a href="aluno.controller.php?id=<?= $value->id_aluno ?>&rotas=sim&acao=editar" class="btn btn-primary btn-xs btn-flat">Editar</a>
                <button type="button"  class="btn btn-danger btn-xs btn-flat" id="teste" onclick="pegar(<?=$value->id_aluno?>,'<?=$value->nome_aluno?>')" data-toggle="modal" data-target="#myModal_<?=$value->id_aluno?>">Excluir</button>
                   <!-- The Modal -->
                   <div class="modal" id="myModal_<?=$value->id_aluno?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Excluir</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            Deseja realmente excluir o/a admin <b><span id="nome_admin"><?= $value->nome_aluno ?></span>?</b>
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                            <a href="aluno.controller.php?acao=remover&id=<?=$value->id_aluno?>"  class="btn btn-success">Sim</a>
                          </div>

                        </div>
                      </div>
                   </div>
              

              </td>
            </tr>
            <?php } ?> 
            <?php } ?> 
          </tbody>
        </table>
        
      </div>
      <!-- /.box-body -->
    </div>

  </div>

</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <!-- Default to the left -->
    Projeto desenvolvido por Joel Malamba e Leonel Diogo.
  </footer>

</div>
<script src="bower_components/bootstrap/dist/js/jquery-3.2.1.slim.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>