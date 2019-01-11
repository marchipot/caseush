<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
     <!-- Load an icon library -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
     crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
     crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--Link to bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Link to my CSS-->
    <link rel="stylesheet" media="all" href="<?php echo url_for('../stylesheets/main.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo url_for('../stylesheets/style.css'); ?>" />

</head>
<body>

<navigation>

<nav id="navbar" class="">
  <div class="nav-wrapper">
    <!-- Navbar Logo -->
    <div class="logo">
      <!-- Logo Placeholder for Inlustration -->
      <a href="#home"><i class="fas fa-chess-knight"></i>Caseing</a>
    </div>

    <!-- Navbar Links -->
    <ul id="menu">
      <li><a href="<?php echo url_for('/index.php') ?>">בית</a></li><!--
   --><li><a href="<?php echo url_for('/caselist.php') ?>">איזור ניהול תיקים</a></li><!--
--> <?php include(SHARED_PATH . '/login_button.php'); ?>
    </ul>
  </div>
</nav>


<!-- Menu Icon -->
<div class="menuIcon">
  <span class="icon icon-bars"></span>
  <span class="icon icon-bars overlay"></span>
</div>

</navigation>



    



