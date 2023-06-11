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
    <title>Golden Lamatwelu</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/Logo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="chat-box">
            <div class="chat-top">
                <a href="chatlist.php" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                <img src="image/pfpPlaceholder.png" width="55" height="55" style="border-radius: 50%;">
                <div>
                    <p style="font-weight: 500;">Golden Lamatwelu</p>
                    <span style="color: rgba(0, 0, 0, 0.3);">nothing bro!</span>
                </div>
            </div>
            <div id="chat-center" class="chat-center">
                <div class="speech right">
                    Hi Golden!
                </div>
                <div class="speech speechBlack left">
                    Hey Jonathan!
                </div>
            </div>
            <div class="chat-top chat-bottom">
                <input id="chat" type="text" placeholder="Message">
                <input type="image" src="image/send.png" onclick="sendText();">
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function sendText() {
        message = document.getElementById("chat").value;
        if (message == null || message == "") {

        } else {
            sendChat = document.createElement("div");
            chat = document.createTextNode(message);
            sendChat.appendChild(chat);
            sendChat.className = "speech right";
            document.getElementById("chat-center").appendChild(sendChat);
            document.getElementById("chat").value = "";
        }
    }
</script>

</html>