<?php
// buffering
ob_start();
include("db.php");


?>
<h2>This is the posts page</h2>



<?php
$content = ob_get_clean();
include("layout.php");
?>