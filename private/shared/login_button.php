<?php
if (!is_logged_in()) {
    ?>
<button class="btn btn btn-primary btn-lg col-sm">log in</button>
<button class="btn btn-secondary btn-lg col-sm">registration</button>
<?php

} else {
    ?>

<button class="btn btn btn-danger btn-lg col-sm">log out</button>
<?php

} ?>