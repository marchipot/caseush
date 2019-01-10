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
    <link rel="stylesheet" media="all" href="<?php echo url_for('../stylesheets/style.css'); ?>" />
<?php


    if(isset($_GET['cat'])){
    if($_GET['cat'] == 'about'){
     $pageTitle = "about";
     }
    else if ($_GET['cat'] == 'openingFile'){
     $pageTitle ="openingFile";
     }
    else if ($_GET['cat'] == 'privateArea'){
     $pageTitle = "privateArea";
     }
    }
?>
     <title><?php echo $pageTitle;?></title>
    
</head>
<body>
<div class="header">
    <div class="row">
        <h1 class="Pname col-8">מעקב התיישנות תיקים עבור משרדי עורכי דין</h1>
       <?php include(SHARED_PATH . '/login_button.php'); ?>
       
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="logo" src="images/logo0.png" width=50px; height=35px>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="index.php">אודות</a></li>
                <li class="nav-item <?php if(isset($section) && $section == 'openingFile'){echo 'on';}?>"><a href="./openingFile.php?cat=openingFile">פתיחת תיק</a></li>
                <li class="nav-item <?php if(isset($section) && $section == 'privateArea'){echo 'on';}?>"><a href="./privateArea.php?cat=privateArea">אזור אישי (תיקים של המשרד שלי)</a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0" hidden>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
    



