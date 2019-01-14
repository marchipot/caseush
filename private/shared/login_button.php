<?php
if (!is_logged_in()) {
    ?>
<li><a href="<?php echo url_for('/login.php') ?>">התחבר</a></li><!--
   --><li><a href="<?php echo url_for('/register.php') ?>">רישום</a></li>
<?php

} else {
    ?>
<li class="selected"> <button class="btn btn-success" ><a href="<?php echo url_for('/caselist.php') ?>">איזור ניהול תיקים</a></button></li>
<li class="selected"><button class="btn btn-danger"><a href="<?php echo url_for('logout.php') ?>">התנתק</a></button></li>
<?php

} ?>