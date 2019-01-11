<?php
if (!is_logged_in()) {
    ?>
<li><a href="<?php echo url_for('/login.php') ?>">התחבר</a></li><!--
   --><li><a href="<?php echo url_for('/register.php') ?>">רישום</a></li>
<?php

} else {
    ?>
<li><a href="<?php echo url_for('/caselist.php') ?>">איזור ניהול תיקים</a></li>
<li><a href="<?php echo url_for('logout.php') ?>">התנתק</a></li>
<?php

} ?>