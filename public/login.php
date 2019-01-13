<?php
require_once('../private/initialize.php');
$page_title="login";
?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div class="jumbotron logjumb">
    <h4 class="logIn">התחברות</h4>
        <form  class="logIn" action="login_process.php" method="post">
            <div class="form-group">
                <label for="exampleInputUsername1">שם משתמש</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">סיסמא</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg">שלח</button>
        </form>
</div>
</body>
</html>


