<?php
include '../include/config.php'; ?>


<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

// If OTP not sent, redirect
if (!isset($_SESSION['otp_sent']) || $_SESSION['otp_sent'] !== true) {
    header("Location: index.php");
    exit();
}

// Optional: Expire after 5 minutes (300 sec)
if (isset($_SESSION['otp_time']) && (time() - $_SESSION['otp_time']) > 300) {
    unset($_SESSION['otp_sent']);
    unset($_SESSION['otp_email']);
    header("Location: index.php?error=timeout");
    exit();
}
?>
<!-- 
<form method="post" action="verify_otp_action.php">
    <input type="text" name="otp" required placeholder="Enter OTP">
    <button type="submit">Verify</button>
</form> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/image/fav.png" type="image/png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background: #195483; */
            padding: clamp(15px, 4vw, 40px);
        }

        /* Container */
        .otp-container {
            width: 100%;
            max-width: clamp(300px, 90%, 420px);
            position: relative;
        }

        /* Animated Border */
        .otp-container::before {
            content: "";
            position: absolute;
            inset: -3px;
            border-radius: 18px;
            background: linear-gradient(90deg, #1a5484, #ff9a6a);
            background-size: 300% 300%;
            animation: borderMove 4s linear infinite;
            z-index: -1;
        }

        @keyframes borderMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Box */
        .otp-box {
            background: #fff;
            border-radius: 16px;
            padding: clamp(25px, 5vw, 40px);
            text-align: center;
        }

        /* Title */
        .otp-box h2 {
            margin-bottom: 20px;
            color: #195483;
            font-size: clamp(20px, 4vw, 26px);
        }

        /* Error */
        .error-msg {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* Timer */
        .timer {
            margin-bottom: 15px;
            font-weight: bold;
            color: #cb5626;
        }

        /* Input */
        input {
            width: 100%;
            padding: 14px;
            border: 2px solid #cb5626;
            border-radius: 10px;
            font-size: 16px;
            margin-bottom: 18px;
            text-align: center;
            letter-spacing: 4px;
        }

        input:focus {
            outline: none;
            border-color: #195483;
            box-shadow: 0 0 8px rgba(25, 84, 131, 0.3);
        }

        /* Button */
        button {
            width: 100%;
            padding: 14px;
            background: #195483;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #cb5626;
        }

        button:disabled {
            background: #999;
            cursor: not-allowed;
        }

        /* Timeout Message */
        .timeout-msg {
            margin-top: 15px;
            font-size: 14px;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="otp-container">
        <div class="otp-box">

            <h2>Enter Mail OTP</h2>

            <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='error-msg'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
            ?>

            <div class="timer">
                Time Remaining: <span id="countdown">05:00</span>
            </div>

            <form method="post" action="verify_otp_action.php" id="otpForm">
                <input type="text" name="otp" required placeholder="Enter OTP" maxlength="6">
                <button type="submit" id="verifyBtn">Verify</button>
            </form>

            <div id="timeoutMessage" class="timeout-msg" style="display:none;">
                Time out – Re-send OTP
            </div>

        </div>
    </div>

    <script>
        let timeLeft = 300; // 5 minutes = 300 seconds
        let countdown = document.getElementById("countdown");
        let verifyBtn = document.getElementById("verifyBtn");
        let timeoutMessage = document.getElementById("timeoutMessage");

        let timer = setInterval(function () {

            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;

            seconds = seconds < 10 ? "0" + seconds : seconds;
            countdown.innerHTML = minutes + ":" + seconds;

            if (timeLeft <= 0) {
                clearInterval(timer);
                countdown.innerHTML = "00:00";
                verifyBtn.disabled = true;
                timeoutMessage.style.display = "block";
            }

            timeLeft--;

        }, 1000);
    </script>

</body>

</html>