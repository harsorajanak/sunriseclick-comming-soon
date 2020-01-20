<?php
session_start();
require __DIR__ . '/helpers/helper.php';
isNotLogin();

session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
// Destroy user session
unset($_SESSION['user_id']);
unset($_SESSION['name']);
// Redirect to index.php page
header("Location: index.php");
?>