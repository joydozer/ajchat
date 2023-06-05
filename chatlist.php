<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chat List</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="image/Logo1.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <div class="chatlist-box">
                <div class="profile">
                    <a href="profile.php"><img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="image/pfpPlaceholder.png"></a>
                    <div style="width: 250px;">
                        <a href="profile.php" style="color: black;"><p id="fullname"><?php echo $username; ?></p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);">Bio</span>
                    </div>
                    <div class="logout">
                        <input type="submit" value="Logout" onclick="window.location.href = 'logout.php'" style="width: 99px; border-radius: 4px; margin: 0;">
                    </div>
                </div>
                <div class="profile ">
                    <div>
                        <p style="font-size: 16px;">Select an user to chat</p>
                    </div>
                </div>
                <div class="profile" style="flex-flow: row;">
                    <img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="image/pfpPlaceholder.png">
                    <div style="width: 325px;">
                        <a href="chat.php" style="color: black;"><p>Golden Lamatwelu</p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);">nothing bro!</span>
                    </div>
                    <img style="border-radius: 50%;" width="15" height="15" src="image/online.png">
                </div>
                <div class="profile" style="flex-flow: row;">
                    <img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="image/pfpPlaceholder.png">
                    <div style="width: 325px;">
                        <a href="chat.html" style="color: black;"><p>Marsya Papona</p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);">Exo-L</span>
                    </div>
                    <img style="border-radius: 50%;" width="15" height="15" src="image/online.png">
                </div>
                <div class="profile" style="flex-flow: row;">
                    <img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="image/pfpPlaceholder.png">
                    <div style="width: 325px;">
                        <a href="chat.html" style="color: black;"><p>Andre Karamoy</p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);">pake nanya</span>
                    </div>
                    <img style="border-radius: 50%;" width="15" height="15" src="image/online.png">
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="account&session.js"></script>
    <script type="text/javascript">
        /*email = localStorage.getItem("email");
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
        console.log(email);*/
    </script>
</html>