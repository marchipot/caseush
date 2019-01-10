<?php
require_once('../private/initialize.php');
include(SHARED_PATH . '/staff_header.php');
?>


<div class="container-fluid">
        <div class="jumbotron">
            <h3>פתיחת תיק חדש</h3>
            <form action=" " method="post">
            <div class="form-group">
                <label>שם הלקוח</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>מספר תיק משרדי</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>עילת התביעה</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך קרות האירוע</label>
                <input type="date" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>תאריך התיישנות</label>
                <input type="date" name="" class="form-control">
            </div>
            <div class="form-group">
                <label>מצב תיק</label>
                <input type="checkbox" checked autocomplete="off"> פתוח
            </div>
            <button type="submit" class="btn btn-primary">שלח</button>
            </form>
        </div>
    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>