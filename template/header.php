<?php 
   require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/db.php';
   require_once $_SERVER['DOCUMENT_ROOT'] . '/template/menu.php';
   require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/get_current.php';

   require_once $_SERVER['DOCUMENT_ROOT'] . '/template/config_params.php';

   session_start();
   if($_SESSION['auth'] == false)
   {
       header('Location: http://quedafoe.ru/');

   }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="/css/main.css">
      <link rel="stylesheet" type="text/css" href="/css/animate.min.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
      <script src="/js/bootstrap.bundle.min.js"></script>
      <!--  Title-->
      <title><?= "LUKOIL - " . gc\getTitleByDir($menu, $_SERVER['REQUEST_URI'] ) ?></title>
   </head>


<body>

<header class="blog-header py-3">
         <nav class="navbar navbar-expand-md navbar-light  center">
            <div class="container  navbar-collapse justify-content-md-center ">
               <a id="logo-area" href="/route/menu" class="navbar-brand d-flex align-items-center">
               <img src="/img/logo.png">
               
               </a>
               <form action="/pages/search" method="GET" id="main-search-form" class="center d-flex col-md-6 text-center align-items-center" required>
                  <input name="search" id="main-search" class="form-control me-1" type="search" placeholder="Поиск" aria-label="Search">
                  <a><button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></a>
               </form>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse text-right" id="navbarCollapse">
                  <?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/template/menuPrint.php' ?>
                   
               </div>
            </div>
         </nav>
</header>

<main>
   <div class="container ">
