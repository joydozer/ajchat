<?php
    include 'db.php';
    session_start();


    if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $password = password_hash($pwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO account VALUES('$name', '$email', '$password')";
        if(mysqli_query($query)) {
            echo "<script>alert('Your account has been created!')</script>";
            echo "<script>window.location = 'login.php'</script>";
        } else {
            echo "<script>alert('Theres something wrong when creating your account, please try again!')</script>";
            echo "<script>window.location = 'register.php'</script>";
        }
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
                <img src="image/Logo.png" width="87" height="27">
                <h1>Sign Up</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="text-align: center;">
                    <div>
                        <p style="text-align: left;">Full Name</p>
                        <input name="name" type="text" placeholder="Enter your full name"><br>
                        <p style="text-align: left;">Email Address</p>
                        <input name="email" type="text" placeholder="Enter your email"><br>
                        <p style="text-align: left;">Password</p>
                        <input name="password" type="password" placeholder="Enter your password"><br>
                    </div>
                    <input name="submit" type="submit" value="Sign Up"><br>
                    Already signed up? <a href="login.php">Login now</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>