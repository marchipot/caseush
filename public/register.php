<?php
require_once('../private/initialize.php');
if(isset($_SESSION['userid'])){
    redirect_to('caselist.php');
}
if (is_post_request()) {

//validation isblank, email is valid , unique username;
$user = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
reg_valid($user,$email,$password);
$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['email'] = $_POST['email'] ?? '';
$user['password'] = $_POST['password'] ?? '';

$result = insert_user($user);
if ($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['userid'] = $new_id;
    redirect_to('caselist.php');

} else {
    $errors = $result;
}

} else {
  // display the blank form
    $user = [];
    $user["username"] = '';
    $user["email"] = '';
    $user["password"] = '';
}


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
    <form action="" method="post">
    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="password">
    <input type="email" placeholder="email" name="email">
    <button name="create">register</button>
    </form>
</body>
</html>