<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email']) && !isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    $id = $_SESSION['id'];
    $get_profile_query = "SELECT * FROM account WHERE id=$id";
    $get_profile_result = mysqli_query($conn, $get_profile_query);
    $pfp = mysqli_fetch_row($get_profile_result);
    if($pfp[4] === NULL) { //nama pfp
        $pfp[4] = "pfpPlaceholder.png";
    }
    if($pfp[5] === NULL) { //profile bio
        $pfp[5] = "Biography";
    }
    $pfp_dir = "pfp/" . $pfp[4];
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
            <div class="chatlist-box"> <!-- Profile Current User -->
                <div class="profile">
                    <a href="profile.php"><img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="<?php echo $pfp_dir; ?>"></a>
                    <div style="width: 250px;">
                        <a href="profile.php" style="color: black;"><?php echo $pfp[1]; ?></a><br>
                        <span style="color: rgba(0, 0, 0, 0.3);"><?php echo $pfp[5]; ?></span>
                    </div>
                    <div class="logout">
                        <input type="submit" value="Logout" onclick="window.location.href = 'logout.php'" style="width: 99px; border-radius: 4px; margin: 0;">
                    </div>
                </div>
                <div class="profile">
                    <div>
                        <p style="font-size: 16px;">Select an user to chat</p>
                    </div>
                </div>
                <div style="height: 300px; overflow-x: hidden;"> <!-- Chat list -->
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
                        <a href="chat.php" style="color: black;"><p>Golden Lamatwelu</p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);">nothing bro!</span>
                    </div>
                    <img style="border-radius: 50%;" width="15" height="15" src="image/online.png">
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
        </div>
    </body>
    <script type="text/javascript" src="account&session.js"></script>
</html>