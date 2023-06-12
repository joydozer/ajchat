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
                        <img height="189" width="189" style="border-radius: 50%;" src="<?php echo $pfp_dir; ?>">
                        <p style="font-weight: 500;" id="fullname"><?php echo $pfp[1]; ?></p>
                        <p> ID #<?php echo $pfp[0]; ?> </p>
                        <span style="color: rgba(0, 0, 0, 0.3);"><?php echo $pfp[5]; ?></span>
                        <a href="profile_edit.php" style="height: 0px;"><input type="submit" style="width: 211px; height: 51px;" value="Edit Profile"> </a>
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