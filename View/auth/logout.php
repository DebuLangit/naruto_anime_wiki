<?php
// Logout View
// This file handles logout action
session_start();
session_destroy();
header('Location: login.php');
exit();
?>
