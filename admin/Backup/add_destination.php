<?php
require '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title   = trim($_POST['title']);
    $alt_tag = trim($_POST['alt_tag']);

    if (empty($title) || empty($alt_tag) || empty($_FILES['image']['name'])) {
        die("All fields are required.");
    }

    $image_name = basename($_FILES['image']['name']); // Keep original name
    $target_dir = "../destination/";
    $target_file = $target_dir . $image_name;

    // Validate extension
    $allowed = ['jpg','jpeg','png','webp'];
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Only JPG, JPEG, PNG, WEBP allowed.");
    }

    // Check file already exists
    if (file_exists($target_file)) {
        die("Image already exists. Rename manually before upload.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

        $stmt = mysqli_prepare($conn, 
            "INSERT INTO destinations (title, image, alt_tag) VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "sss", $title, $image_name, $alt_tag);
        mysqli_stmt_execute($stmt);

        echo "Destination added successfully!";
    } else {
        echo "Upload failed.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Destination Title" required><br><br>
    <input type="text" name="alt_tag" placeholder="Alt Tag" required><br><br>
    <input type="file" name="image" required><br><br>
    <button type="submit">Add Destination</button>
</form> 

<?php
// require '../include/config.php';

// $message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $title   = trim($_POST['title']);
//     $alt_tag = trim($_POST['alt_tag']);

//     if (empty($title) || empty($alt_tag) || empty($_FILES['image']['name'])) {
//         $message = "<div class='alert error'>All fields are required.</div>";
//     } else {

//         $image_name = basename($_FILES['image']['name']);
//         $target_dir = "../destinations/";
//         $target_file = $target_dir . $image_name;

//         $allowed = ['jpg','jpeg','png','webp'];
//         $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

//         if (!in_array($ext, $allowed)) {
//             $message = "<div class='alert error'>Only JPG, JPEG, PNG, WEBP allowed.</div>";
//         } elseif (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

//             $stmt = mysqli_prepare($conn,
//                 "INSERT INTO destinations (title, image, alt_tag) VALUES (?, ?, ?)"
//             );
//             mysqli_stmt_bind_param($stmt, "sss", $title, $image_name, $alt_tag);
//             mysqli_stmt_execute($stmt);

//             $message = "<div class='alert success'>Destination added successfully!</div>";
//         } else {
//             $message = "<div class='alert error'>Upload failed.</div>";
//         }
//     }
// }
?>

<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Destination</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #667eea,#c44230b5);
    padding:20px;
}

.card{
    width:100%;
    max-width:500px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:40px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    color:#fff;
    animation: fadeIn 0.6s ease;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

h2{
    text-align:center;
    margin-bottom:30px;
    font-weight:600;
    letter-spacing:1px;
}

.form-group{
    position:relative;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:14px 12px;
    border:none;
    border-radius:10px;
    font-size:14px;
    outline:none;
    background:rgba(255,255,255,0.9);
    transition:0.3s;
}

input:focus{
    box-shadow:0 0 0 3px rgba(255,255,255,0.3);
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#fff;
    color:#764ba2;
    font-weight:600;
    font-size:15px;
    cursor:pointer;
    transition:0.3s ease;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.alert{
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
    font-size:13px;
    text-align:center;
}

.success{
    background:rgba(0,255,150,0.2);
    color:#fff;
}

.error{
    background:rgba(255,0,80,0.2);
    color:#fff;
}

/* Responsive */

@media(max-width:480px){
    .card{
        padding:25px;
    }

    h2{
        font-size:20px;
    }
}

</style>
</head>

<body>

<div class="card">
    <h2>Add Destination</h2>

    <?php echo $message; ?>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" name="title" placeholder="Destination Title" required>
        </div>

        <div class="form-group">
            <input type="text" name="alt_tag" placeholder="Alt Tag" required>
        </div>

        <div class="form-group">
            <input type="file" name="image" required>
        </div>

        <button type="submit">Add Destination</button>

    </form>
</div>

</body>
</html> -->