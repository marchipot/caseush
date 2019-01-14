<?php require_once('../private/initialize.php'); ?>
<?php
$section = "privateArea";
?>
<?php

if (!isset($_SESSION['userid'])) {
    redirect_to_login("user not logged in");
}
$user_id = $_SESSION['userid'];
$case_set = find_all_cases($user_id);
?>

<?php $page_title = 'case list'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="pages listing">
      
      
      <a href="<?php  ?>"></a>
      
    </table>
    <div class="container-fluid">
        <div class="jumbotron" >
                  <div class="page-header">
                      
                      <h1>אזור אישי (תיקים של המשרד שלי)</h1>
                      <a href="<?php echo url_for('/create_case.php'); ?>"><button class="btn"  title="הוסף"><i class="fas fa-plus"></i> הוסף </button></a>
                    </div>
                   
            <table class="table" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">שם הלקוח</th> 
                    <th scope="col">מספר תיק משרדי</th>
                    <th scope="col">תאריך קרות האירוע</th> 
                    <th scope="col">תאריך התיישנות</th> 
                    <th scope="col">עילת התביעה</th>
                    <th scope="col">מצב תיק</th>
                    <th scope="col">מס ימים עד התישנות </th>
                    <th scope="col">עריכה</th>
                    <th scope="col">למחוק</th>
                

                </tr>
            </thead>
            <tbody>
              
      <?php while ($case = mysqli_fetch_assoc($case_set)) {

            if (!$case['is_archived']) { ?>
        <tr>
        <td><?php echo h($case['id']); ?></td>
          <td><?php echo h($case['customer_name']); ?></td>
          <td><?php echo h($case['case_number']); ?></td>
          <td><?php  
           $date = new DateTime(h($case['start_date'])); ; 
           echo $date->format('d/m/Y'); ?></td>
          <td><?php  
           $date = new DateTime(h($case['end_date'])); ; 
           echo $date->format('d/m/Y'); ?></td>
          <td><?php echo h($case['title']); ?></td>
          <td><?php echo $case['is_open'] == 1 ? 'פתוח' : 'סגור'; ?></td>
          
          <td><?php $datetime1 = date_create(date('y-m-d'));
                $datetime2 = date_create($case['end_date']);
                $interval = date_diff($datetime1, $datetime2);
                $timeLeft = (int) $interval->format('%a');
               
                if($timeLeft >= "60") {
                    echo '<span class="green">'  . $timeLeft . '</span>';
                } elseif($timeLeft <= "60" && $timeLeft >= "31") {
                   echo '<span class="yellow">'  .  $timeLeft . '</span>';
                }elseif($timeLeft <= "30"){
                    echo '<span class="red">'   .$timeLeft .'</span>';
                }
                
                ?></td>
                
          <td><a class="action" href="<?php echo url_for("edit_case.php?id=" . h(u($case['id']))); ?>"><i class="far fa-edit"></i></a></td>
          <td><a class="action" href="<?php echo url_for("archive_case.php?id=" . h(u($case['id']))); ?>"><i class="fas fa-trash"></i></a></td>

                </tr>
                <?php 
            } ?>
            <?php 
        } ?>
            </tbody>
            </table>
            <div class="pages"></div>
        </div>
    </div>
    
    
    <?php mysqli_free_result($case_set); ?>

  </div>

</div>
<?php echo get_interval($case) ?>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
