<?php
SESSION_START();
SESSION_DESTROY();
header('Location:index.php');
//echo "you've been logged out". "<a href='index.php'>click here</a> to login";
?>