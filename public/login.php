<?php
require_once('../private/initialize.php');
$page_title="login";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="login_process.php" method="post">
        <input type="text" name="username" placeholder="username" >
        <input type="password" name="password" placeholder="password" >
        <input type="submit" name="submit"  >
    </form>
</body>
</html>


