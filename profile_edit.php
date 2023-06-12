<?php
    include 'db.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION['email']) && !isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    $id = $_SESSION['id'];
    $get_profile_query = "SELECT * FROM account WHERE id=$id";
    $get_profile_result = mysqli_query($conn, $get_profile_query);
    $pfp = mysqli_fetch_row($get_profile_result);
    if($pfp[4] === NULL) { //template pfp file name
        $pfp[4] = "pfpPlaceholder.png";
    }
    if($pfp[5] === NULL) { //profile bio
        $pfp[5] = "Biography";
    }
    $pfp_dir = "pfp/" . $pfp[4];
    if(isset($_POST['submit'])) {
        $dir = "pfp/";
        $file = $_FILES['pfp']['name'];
        $tmp_dir = $_FILES['pfp']['tmp_name'];
        $error = $_FILES['pfp']['error'];
        $file_size = $_FILES['pfp']['size'];
        $extension_valid = ['jpg', 'jpeg', 'png', 'gif'];
        $extension_file = explode('.', $file);
        $extension_file = strtolower(end($extension_file));
        $new_name = $_POST['name'];
        $new_bio = $_POST['bio'];
        if(empty($new_name)) {
            $new_name = $pfp[1];
        }
        if(empty($new_bio)) {
            $new_bio = $pfp[5];
        }
        if($file_size == 0) {
            $new_file = $pfp[4];
        }
        if($file_size != 0) {
            $new_file = uniqid();
            $new_file = $new_file . '.' . $extension_file;
            move_uploaded_file($tmp_dir, $dir . $new_file);
        }
        if(!in_array($extension_file, $extension_valid)) {
            echo "<script>alert('Please upload again with the allowed extension files, like .jpg, .jpeg, .gif, and .png')</script>";
            echo "<script>window.location = 'profile_edit.php'</script>";
            die();
        }
        if($file_size > 20000000) {
            echo "<script>alert('Your image files is too big!')</script>";
            echo "<script>window.location = 'profile_edit.php'</script>";
            die();
        }
        $query = "UPDATE account SET name = '$new_name', pfp = '$new_file', bio = '$new_bio' WHERE id=$id";
        mysqli_query($conn, $query); 
        header("Location: profile_edit.php");
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
                <a href="profile.php" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                <div class="profile-box-content-mid" style="row-gap: 10px;">
                    <h1> Edit Profile </h1>
                    <form action="" method="POST" enctype="multipart/form-data" style="text-align: center;">
                    <div class="edit-pfp">
                        <img height="189" width="189" style="border-radius: 50%;" src="<?php echo $pfp_dir; ?>">
                        <div class="edit-pfp-text">
                            Change Picture
                            <input name="pfp" type="file">
                        </div>
                    </div>
                    <br>
                    <p style="text-align: left;">Full Name</p>
                    <input name="name" id="full-name" type="text" placeholder="<?php echo $pfp[1]; ?>"><br> <br>
                    <p style="text-align: left;">Bio</p>
                    <input name="bio" id="bio" type="text" placeholder="<?php echo $pfp[5]; ?>"> <br>
                    <input name="submit" id="save-changes" type="submit" style="width: 211px; height: 51px;" value="Save Changes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>