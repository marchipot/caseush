<?php
require_once('../private/initialize.php');
include(SHARED_PATH . '/staff_header.php');
if (!isset($_SESSION['userid'])) {
    redirect_to('index.php');
}
$user_id = $_SESSION['userid'];
echo $user_id;
if(is_post_request()){
$case = $_POST['customer_name'];
$case = $_POST['case_number'];
$case = $_POST['start_date'];
$case = $_POST['end_date'];
$case = $_POST['title'];
$case = $_POST['is_open'];
$case = [];
$case['user_id'] = $user_id ?? '';
$case['customer_name'] = $_POST['customer_name'] ?? '';
$case['case_number'] = $_POST['case_number'] ?? '';
$case['start_date'] = $_POST['start_date'] ?? '';
$case['end_date'] = $_POST['end_date'] ?? '';
$case['title'] = $_POST['title'] ?? '';
$case['is_open'] = $_POST['is_open'] ?? '';

insert_case($case);

}
?>

<div class="container-fluid">
        <div class="jumbotron">
            <h3>פתיחת תיק חדש</h3>
            <form action="" method="post">
            <div class="form-group">
                <label>שם הלקוח</label>
                <input type="text" name="customer_name" class="form-control">
            </div>
            <div class="form-group">
                <label>מספר תיק משרדי</label>
                <input type="text" name="case_number" class="form-control">
            </div>
            <div class="form-group">
                <label>עילת התביעה</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך קרות האירוע</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך התיישנות</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <label>מצב תיק</label>
                <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="is_open" value="1" checked="true" />
            </div>
            <button type="submit" class="btn btn-primary">שלח</button>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>