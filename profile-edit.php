<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }

    
    if(isset($_POST['submit']) && !empty($_FILES['pfp'])) {
        $dir = "pfp/";
        $file = $_FILES['pfp']['name'];
        $tmp_dir = $_FILES['pfp']['tmp_name'];
        $error = $_FILES['pfp']['error'];
        $file_size = $_FILES['pfp']['size'];
        $extension_valid = ['jpg', 'jpeg', 'png'];
        $extension_file = explode('.', $file);
        $extension_file = strtolower(end($extension_file));
        if($error === 4) {
            echo "<script>alert('Please choose an image first!')</script>";
        }
        if(in_array($extension_file, $extension_valid)) {
            echo "<script>alert('Please only upload images extension files, like .jpg, .jpeg, and .png')</script>";
        }
        if($file_size > 20000000) {
            echo "<script>alert('Your image files is too big!')</script>";
        }
        $new_file = uniqid();
        $new_file = $new_file . '.' . $extension_file;
        move_uploaded_file($tmp_dir, $dir . $new_file);
        $query = "UPDATE account SET pfp = '$file' WHERE id=1";
        mysqli_query($conn, $query);
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/Logo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="chat-box profile-box">
            <div class="profile-box-content">
                <a href="chatlist.php" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                <div class="profile-box-content-mid" style="row-gap: 10px;">
                    <h1> Edit Profile </h1>
                    <form action="" method="POST" enctype="multipart/form-data" style="text-align: center;">
                    <div class="edit-pfp">
                        <img height="189" width="189" style="border-radius: 50%;" src="image/pfpPlaceholder.png">
                        <div class="edit-pfp-text">
                            Change Picture
                            <input name="pfp" type="file">
                        </div>
                    </div>
                    <br>
                    <p style="text-align: left;">Full Name</p>
                    <input id="full-name" type="text" placeholder="Full Name"><br> <br>
                    <p style="text-align: left;">Bio</p>
                    <input id="bio" type="text" placeholder="Biography"> <br>
                    <input name="submit" id="save-changes" type="submit" style="width: 211px; height: 51px;" value="Save Changes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>