<?php
session_start();
unset($_SESSION['login_user_email']);
session_destroy();

header("Location: index.php");
exit;
