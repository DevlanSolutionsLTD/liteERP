<?php
    session_start();
    unset($_SESSION['login_id']);
    session_destroy();

    header("Location: admin_login.php");
    exit;
