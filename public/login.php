<?php
require_once('../private/initialize.php');
$page_title="login";
?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <form action="login_process.php" method="post">
        <input type="text" name="username" placeholder="username" >
        <input type="password" name="password" placeholder="password" >
        <input type="submit" name="submit"  >
    </form>
</body>
</html>


