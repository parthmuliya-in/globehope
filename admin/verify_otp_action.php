<?php
include '../include/config.php';

if (!isset($_SESSION['admin_temp_id'])) {
    header("Location: index.php");
    exit;
}

// $id  = $_SESSION['admin_temp_id'];
// $otp = intval($_POST['otp']);

// $stmt = mysqli_prepare(
//     $conn,
//     "SELECT otp FROM admin_otp
//      WHERE admin_id = ?
//      AND otp = ?
//      AND expires_at >= NOW()"
// );

// mysqli_stmt_bind_param($stmt, "ii", $id, $otp);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);

$id = $_SESSION['admin_temp_id'];
$otp = intval($_POST['otp']);
$current_time = date("Y-m-d H:i:s");

$stmt = mysqli_prepare(
    $conn,
    "SELECT otp FROM admin_otp
     WHERE admin_id = ?
     AND otp = ?
     AND expires_at >= ?"
);

mysqli_stmt_bind_param($stmt, "iss", $id, $otp, $current_time);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_fetch_assoc($result)) {

    session_regenerate_id(true);

    $_SESSION['admin_logged_in'] = true;
    unset($_SESSION['admin_temp_id']);

    $stmt = mysqli_prepare($conn, "DELETE FROM admin_otp WHERE admin_id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit;
}

$_SESSION['error'] = "Invalid or expired OTP";
header("Location: verify_otp.php");
exit;