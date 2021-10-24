<?php 

  getModal('modalProfile',$data);

?>
<html lang="es">

<head>
<meta charset="utf-8">
  <meta name="description" content="Sistema Administrativo de Hotel Norma">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Hugo Roms">
  <meta name="theme-color" content="#009688">

    <title><?= $data['page_tag'];?></title>
  
    <!-- Main CSS-->
    <link rel="stylesheet" href="<?=media();?>/css/main.css">
    <link rel="stylesheet" href="<?= media();?>/css/style.css">
     <!-- SweetAlert2 -->
   <link rel="stylesheet" href="<?=media();?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Select -->
   <link rel="stylesheet" href="<?=media();?>/css/bootstrap-select.min.css">
    </head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?=base_url();?>">Hotel Norma</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#"  role="button" onclick="openModalProfile();return false;"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="<?=base_url();?>/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <?php  require_once("nav_admin.php");?>