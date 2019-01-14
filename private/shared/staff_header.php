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
    <link rel="stylesheet" href="<?php echo url_for('../stylesheets/style.css'); ?>">
    <script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo url_for('/vendor/animate/animate.css'); ?>">
  <link rel="stylesheet" href="<?php echo url_for('/assets/css/style.css'); ?>">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script src="<?php echo url_for('/js/js.js') ?>"></script>
<script src="<?php echo url_for('/js/sticky navbar.js')?>"></script>


    
</html>

</head>
<body>
<div class="header">
    <div class="row my-2 my-lg-0">
    <h4 class="webT mr-sm-2">CasInq  <img src="../images/logo0.png" width=45px; height=35px></h4>
    <div class="col"></div>
    <h4 class="tit my-2 my-sm-0">מעקב התיישנות תיקים</h4> 
    </div> 


		<nav class="navigation">
			<ul>
        <li class="selected"><a href="index.php" title="">אודות</a></li>
        <li class="selected <?php if($section == 'caselist'){echo 'on';}?>"><a href="./caselist.php?cat=caseList">אזור ניהול תיקים</a></li>
        <li class="selected"><button class="btn" >התחברות</button></li>
        <li class="selected"><button class="btn">רישום</button></li>
				<!-- <li class="current"><a href="index.html" >אודות</a></li> -->
			</ul>	
</div>
  
