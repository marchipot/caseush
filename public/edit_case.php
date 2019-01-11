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
echo $id . "<br>";


$user_id = $_SESSION['userid'];
if (is_post_request()) {

    $case = [];
    $case['id'] = $id;
    $case['user_id'] = $user_id ?? '';
    $case['customer_name'] = $_POST['customer_name'] ?? '';
    $case['case_number'] = $_POST['case_number'] ?? '';
    $case['start_date'] = $_POST['start_date'] ?? '';
    $case['end_date'] = $_POST['end_date'] ?? '';
    $case['title'] = $_POST['title'] ?? '';
    $case['is_open'] = $_POST['is_open'] ?? '';

    $result = update_case($case);
    if ($result === true) {
        redirect_to(url_for('caselist.php'));


    }
} else {
    $case = find_case_by_id($id);
}

$case_set = find_all_cases($user_id);
$case_count = mysqli_num_rows($case_set);
mysqli_free_result($case_set);
?>

<div class="container-fluid">
        <div class="jumbotron">
            <h3> עריכת תיק </h3>
            <form action="" method="post">
            <div class="form-group">
                <label>שם הלקוח</label>
                <input type="text" value="<?php echo h($case['customer_name']); ?>" name="customer_name" class="form-control">
            </div>
            <div class="form-group">
                <label>מספר תיק משרדי</label>
                <input type="text" value="<?php echo h($case['case_number']); ?>" name="case_number" class="form-control">
            </div>
            <div class="form-group">
                <label>עילת התביעה</label>
                <input type="text" value="<?php echo h($case['title']); ?>" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך קרות האירוע</label>
                <input type="date" value="<?php echo h($case['start_date']); ?>" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך התיישנות</label>
                <input type="date" value="<?php echo h($case['end_date']); ?>" name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <label>מצב תיק</label>
                <input type="hidden" name="is_open" value="0" />
          <input type="checkbox" name="is_open" value="1"<?php if($case['is_open'] == "1") { echo " checked"; } ?> />
            </div>
            <button type="submit" class="btn btn-primary">שלח</button>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>