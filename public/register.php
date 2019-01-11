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

<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- <form action="" method="post"> -->
    
    <div class="jumbotron">
        <h4 class="logIn">הרשמה</h4>
        <form  class="logIn" action="login_process.php" method="post">
            <div class="form-group">
                <label for="exampleInputUsername1">שם משתמש</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">כתובת אי-מייל</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">אנו לעולם לא נחלוק את האי-מייל שלך עם מישהו אחר</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">סיסמא</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
            </div>
            <button type="submit" name="create" class="btn btn-primary btn-lg">שלח</button>
        </form>
    </div>