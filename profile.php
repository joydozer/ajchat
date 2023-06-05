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
                    <a href="chatlist.php" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                    <div class="profile-box-content-mid">
                        <h1> Edit Profile </h1>
                        <img height="189" width="189" style="border-radius: 50%;" src="image/pfpPlaceholder.png">
                        <p style="font-weight: 500;" id="fullname"></p>
                        <span style="color: rgba(0, 0, 0, 0.3);">Bio</span>
                        <a href="profile-edit.php"><input type="submit" style="width: 211px; height: 51px;" value="Edit Profile"> </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="account&session.js"></script>
    <script type="text/javascript">
        email = localStorage.getItem("email");
        fullname = "";
        if(email == "admin") {
            fullname = "admin";
        } else {
            for(let i=0; i<emails.length;i++) {
                if(email == emails[i]) {
                    fullname = fullnames[i];
                }
            }
        }
        document.getElementById("fullname").innerHTML += fullname;
        console.log(email);
    </script>
</html>