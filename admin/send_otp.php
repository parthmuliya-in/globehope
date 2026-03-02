<?php
// session_start();
include '../include/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

/* ---------- INPUT CHECK ---------- */
if (!isset($_POST['email'], $_POST['password'])) {
    $_SESSION['error'] = "Invalid request";
    header("Location: login.php");
    exit;
}

$email    = trim($_POST['email']);
$password = $_POST['password'];

/* ---------- CHECK ADMIN ---------- */
$stmt = mysqli_prepare($conn, "SELECT id, password FROM admins WHERE email=?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$admin = mysqli_fetch_assoc($result)) {
    $_SESSION['error'] = "Invalid login details";
    header("Location: login.php");
    exit;
}

/* ---------- VERIFY PASSWORD ---------- */
if (!password_verify($password, $admin['password'])) {
    $_SESSION['error'] = "Invalid login details";
    header("Location: login.php");
    exit;
}

/* ---------- GENERATE OTP ---------- */
$otp    = random_int(100000, 999999);
$expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

$stmt2 = mysqli_prepare(
    $conn,
    "REPLACE INTO admin_otp (admin_id, otp, expires_at) VALUES (?, ?, ?)"
);
mysqli_stmt_bind_param($stmt2, "iss", $admin['id'], $otp, $expiry);
mysqli_stmt_execute($stmt2);

$_SESSION['admin_temp_id'] = $admin['id'];

/* ---------- SEND EMAIL ---------- */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // 🔐 PUT YOUR DETAILS HERE
    $mail->Username   = 'parthmuliya02@gmail.com';
    $mail->Password   = 'sbdszsstzgzyaqpn';

    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('parthmuliya02@gmail.com', 'Admin Login');
    $mail->addAddress($email);

    $mail->Subject = 'Admin Login OTP';
    $mail->Body    = "Your OTP is: $otp\nValid for 5 minutes.";

    $mail->send();
} catch (Exception $e) {
    $_SESSION['error'] = "OTP email sending failed";
    header("Location: login.php");
    exit;
}

/* ---------- SUCCESS ---------- */
header("Location: verify_otp.php");
// After OTP sent successfully
$_SESSION['otp_email'] = $email;   // store email
$_SESSION['otp_sent']  = true;     // mark OTP as sent
$_SESSION['otp_time']  = time();   // store time (for 5 min expiry)
exit;
