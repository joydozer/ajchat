<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email']) && !isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    $id = $_SESSION['id'];
    $receiver_id = $_GET['id'];
    $get_receiver_profile = mysqli_fetch_row(mysqli_query($conn, "SELECT name,bio,pfp,email FROM account WHERE id=$receiver_id"));
    if($get_receiver_profile[1] == NULL) {
        $get_receiver_profile[1] = "Biography";
    }
    if($get_receiver_profile[2] == NULL) {
        $get_receiver_profile[2] = "pfpPlaceholder.png";
    }
    if(isset($_POST['send_x'])) {
        $timestamp = date("Y-m-d H:i:s");
        $msg = $_POST['msg'];
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_key = $_SESSION['email'];
        $encryption_iv = '2494344007986803';
        $encryption = openssl_encrypt($msg, $ciphering, $encryption_key, $options, $encryption_iv);
        $sender_query = mysqli_query($conn, "INSERT INTO `msg_log` VALUES($receiver_id, $id, '$encryption', '$timestamp')");
        if($sender_query) {
            header("Location: chat.php?id=" . $receiver_id);
        } else {
            echo "<script>alert('There is something wrong when sending your messages to the database!')</script>";
            echo "<script>window.location = 'chat.php'</script>";
            die();
        }
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $get_receiver_profile[0]; ?></title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/Logo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="chat-box">
            <!-- Receiver profile -->
            <div class="chat-top">
                <a href="chatlist.php" style="margin-left: 20px;"><img src="image/Arrow 2.png"></a>
                <img src="pfp/<?php echo $get_receiver_profile[2] ?>" width="55" height="55" style="border-radius: 50%;">
                <div>
                    <p style="font-weight: 500;"><?php echo $get_receiver_profile[0]; ?></p>
                    <span style="color: rgba(0, 0, 0, 0.3);"><?php echo $get_receiver_profile[1]; ?></span>
                </div>
            </div>
            <!-- Chat content -->
            <div id="chat-center" class="chat-center">
            <?php 
                $get_chat = mysqli_query($conn,"SELECT * FROM msg_log ORDER BY time ASC");
                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_key = $_SESSION['email'];
                $encryption_iv = '2494344007986803';
                $encryption_key_receiver = $get_receiver_profile[3];
                while($row = mysqli_fetch_assoc($get_chat)) :
                    if($row['id_sender'] == $id && $row['id_receiver'] == $receiver_id) {
            ?>
                <div class="speech right">
                    <?php
                        
                        $decryption = openssl_decrypt($row['msg'], $ciphering, $encryption_key, $options, $encryption_iv);
                        echo $decryption; 
                    ?>
                </div>
                <?php } else if($row['id_receiver'] == $id && $row['id_sender'] == $receiver_id) { ?>
                <div class="speech speechBlack left">
                    <?php
                        $decryption = openssl_decrypt($row['msg'], $ciphering, $encryption_key_receiver, $options, $encryption_iv);
                        echo $decryption;
                    ?>
                </div>
            <?php } endwhile; ?>
            </div>
            
            <div class="chat-top chat-bottom">
                <form action="" method="POST" style="display: flex; justify-content: center; align-items: center;">
                    <input name="msg" id="chat" type="text" placeholder="Message">
                    <input name="send" type="image" src="image/send.png">
                </form>
            </div>
        </div>
    </div>
</body>

</html>