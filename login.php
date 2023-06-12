<?php
    include 'db.php';
    session_start();

    if(isset($_SESSION['email'])) {
        header("Location: chatlist.php");
    }

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM account WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hp = $row['password'];
            if(password_verify($password, $hp)) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: chatlist.php");
            } else {
                echo "<script>alert('We're unable to verify your password, please try again later!')</script>";
                echo "<script>window.location = 'login.php'</script>";
                die();
            }
        } else {
            echo "<script>alert('Your email or password is wrong, please try again!')</script>";
            echo "<script>window.location = 'login.php'</script>";
            die();
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/Logo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="login-box">
            <div class="login-box-content">
                <a href="index.php"><img src="image/Logo.png" width="87" height="27"></a>
                <h1>Welcome Folks!</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="text-align: center;">
                    <div class="login-box-form">
                        <p style="text-align: left;">Email Address</p>
                        <input name="email" id="email" type="text" placeholder="Enter your email"><br>
                        <p style="text-align: left;">Password</p>
                        <input name="password" id="password" type="password" placeholder="Enter your password"><br>
                    </div>
                    <input name="submit" type="submit" value="Login"><br>
                    Not yet signed up? <a href="register.php">Signup now</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>