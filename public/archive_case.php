<?php
require_once('../private/initialize.php');
include(SHARED_PATH . '/staff_header.php');
if (!isset($_SESSION['userid'])) {
    redirect_to('index.php');
}

if (!isset($_GET['id'])) {
    redirect_to(url_for('caselist.php'));
}
$id = $_GET['id'];
echo $id;
if(is_post_request()){
$user_id = $_SESSION['userid'];
$case = [];
$case['id'] = $id;
$case['is_archived'] = $_POST['is_archived'] ?? '';;

$result = archived_case($case);
if($result === true) {
    redirect_to(url_for('caselist.php'));
  } else {
    $errors = $result;
    var_dump($errors);
  }
}
?>
<form action="" method="post">
<h1>האם את/ה בטוח?</h1>
<button class="btn btn-success">yes</button>
</form>
<a href="<?php echo url_for('caselist.php'); ?>" > 
<button class="btn btn-danger">no</button>
</a>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>