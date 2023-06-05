<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
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
                <a href="chatlist.html" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                <div class="profile-box-content-mid" style="row-gap: 10px;">
                    <h1> Edit Profile </h1>
                    <div class="edit-pfp">
                        <img height="189" width="189" style="border-radius: 50%;" src="image/pfpPlaceholder.png">
                        <div class="edit-pfp-text">
                            Change Picture
                        </div>
                    </div>
                    Full Name<br>
                    <input id="full-name" type="text" placeholder="Full Name"><br>
                    Bio<br>
                    <input id="bio" type="text" placeholder="Biography">
                    <a href="profile.html"><input id="save-changes" type="submit" style="width: 211px; height: 51px;"
                            value="Save Changes"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>