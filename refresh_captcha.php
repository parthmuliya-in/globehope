<?php
session_start();

$_SESSION['captcha'] = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);

echo $_SESSION['captcha'];