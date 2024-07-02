<?php
session_start();
unset($session['username']);
session_destroy();

header("location: index.php");
exit;
?>