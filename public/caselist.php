<?php require_once('../private/initialize.php'); ?>
<?php
        $section = "privateArea";
    ?>
<?php

if(!isset($_SESSION['userid'])){
    redirect_to_login("user not logged in");
}
$user_id = $_SESSION['userid'];
$case_set = find_all_cases($user_id);
?>

<?php $page_title = 'case list'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="pages listing">
    <h1>אזור אישי (תיקים של המשרד שלי)</h1>

    
   <a href="<?php ?>"></a>

  	</table>
      <div class="container-fluid">
        <div class="jumbotron">
            <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">שם הלקוח</th> 
                    <th scope="col">מספר תיק משרדי</th>
                    <th scope="col">תאריך קרות האירוע</th> 
                    <th scope="col">תאריך התיישנות</th> 
                    <th scope="col">עילת התביעה</th>
                    <th scope="col">מצב תיק</th>
                    <th scope="col">עריכה</th>
                    <th scope="col">למחוק</th>

                </tr>
            </thead>
            <tbody>
              
      <?php while($case = mysqli_fetch_assoc($case_set)) { ?>
        
        <tr>
        <td><?php echo h($case['id']); ?></td>
          <td><?php echo h($case['customer_name']); ?></td>
          <td><?php echo h($case['case_number']); ?></td>
          <td><?php echo h($case['start_date']); ?></td>
          <td><?php echo h($case['end_date']); ?></td>
          <td><?php echo h($case['title']); ?></td>
          <td><?php echo $case['is_open'] == 1 ? 'true' : 'false'; ?></td>
          <td><a class="action" href="<?php echo url_for( "edit_case.php?id=" . h(u($case['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for("archive_case.php?id=" . h(u($case['id']))); ?>">Delete</a></td>

                </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
    <?php mysqli_free_result($case_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
