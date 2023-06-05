<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "ajchat";
    $conn = mysqli_connect($server, $user, $pass, $database);

    if (!$conn) {
        die("<script>alert('Terjadi error pada saat koneksi ke database!')</script>");
    }
?>