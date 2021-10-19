<?php
session_start();
$_SESSION = [];
// session habiis
session_unset();
session_destroy();
//  cookie terhapus
setcookie('id', '', time() - 3600 );
setcookie('key', '', time() - 3600 );

header("location: login.php");

exit;
?>