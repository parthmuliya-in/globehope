<?php
// session_start();
include '../include/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
 <!-- Favicon -->
  <link rel="icon" href="assets/image/fav.png" type="image/png">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    /* background:#195483; */
    padding:clamp(15px,4vw,40px);
}

/* Responsive Wrapper */
.login-container{
    width:100%;
    max-width:clamp(300px, 90%, 420px);
    position:relative;
}

/* Animated Border */
.login-container::before{
    content:"";
    position:absolute;
    inset:-3px;
    border-radius:18px;
    background:linear-gradient(90deg, #1a5484, #ff9a6a);
    background-size:300% 300%;
    animation:moveBorder 4s linear infinite;
    z-index:-1;
}

@keyframes moveBorder{
    0%{ background-position:0% 50%; }
    50%{ background-position:100% 50%; }
    100%{ background-position:0% 50%; }
}

/* Login Box */
.login-box{
    background:#ffffff;
    border-radius:16px;
    padding:clamp(25px,5vw,40px);
    width:100%;
}

/* Title */
.login-box h2{
    text-align:center;
    margin-bottom:25px;
    color:#195483;
    font-size:clamp(20px,4vw,26px);
}

/* Error */
.error-msg{
    color:red;
    text-align:center;
    margin-bottom:15px;
    font-size:19px;
}

/* Input Fields */
.input-group{
    margin-bottom:18px;
}

.input-group input{
    width:100%;
    padding:14px;
    border:2px solid #cb5626;
    border-radius:10px;
    font-size:15px;
    transition:0.3s;
}

.input-group input:focus{
    outline:none;
    border-color:#195483;
    box-shadow:0 0 8px rgba(25,84,131,0.3);
}

/* Button */
button{
    width:100%;
    padding:14px;
    background:#195483;
    color:#fff;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#cb5626;
}

/* Extra Small Devices */
@media (max-width:380px){
    .login-box{
        padding:20px;
    }
}
</style>
</head>
<body>

<div class="login-container">
    <div class="login-box">

        <h2>Admin Login</h2>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='error-msg'>".$_SESSION['error']."</div>";
            unset($_SESSION['error']);
        }
        ?>

        <form method="post" action="send_otp.php">
            
            <div class="input-group">
                <input type="email" name="email" required placeholder="Enter Email">
            </div>

            <div class="input-group">
                <input type="password" name="password" required placeholder="Enter Password">
            </div>

            <button type="submit">Login</button>

        </form>

    </div>
</div>

</body>
</html>

<!-- <form method="post" action="send_otp.php">
    <input type="email" name="email" required placeholder="Email"><br><br>
    <input type="password" name="password" required placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form> -->
