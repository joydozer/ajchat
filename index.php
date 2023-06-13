<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AjChat!</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="image/Logo1.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div style="background-color: white; position: fixed; z-index: -99; width: 45vw; height: 100vh;">
        </div>
        <div class="logoTop">
            <img src="image/Logo.png" width="142" height="42">
        </div>
        <div class="main" style="flex-flow: row; column-gap: 300px;">
            <img class="iconIndex" src="image/chatbox-icon 1.png">
            <div class="indexGetStarted">
                <div class="indexContent">
                    <h1>Let's chat</h1>
                    <h1 style="color: black; margin-bottom: 25px;">to be more closer!</h1>
                    <p>AjChat is a website that you can use to chat <br> with each other!</p>
                    <a href="login.php"><button>Get Started!</button></a>
                </div>
                <div class="indexAboutUs">
                    <p> Want to know about the Developers? </p>
                    <a href="aboutus.html">Click This</a>
                </div>
            </div>
        </div>
        <div class="main-bottom">
            
        </div>
    </body>
</html>