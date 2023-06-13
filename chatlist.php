<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION['email']) && !isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    $id = $_SESSION['id'];
    $get_profile_query = "SELECT * FROM account WHERE id=$id";
    $get_profile_result = mysqli_query($conn, $get_profile_query);
    $chatlist = "chatlist_" . $_SESSION['email'];
    $pfp = mysqli_fetch_row($get_profile_result);
    if($pfp[4] === NULL) { //template pfp file name
        $pfp[4] = "pfpPlaceholder.png";
    }
    if($pfp[5] === NULL) { //profile bio
        $pfp[5] = "Biography";
    }
    $pfp_dir = "pfp/" . $pfp[4];
    if(isset($_POST['submitAddPeople_x'])) {
        $idPeople = $_POST['idPeople'];
        if($idPeople == $id) {
            echo "<script>alert('You can not add yourself!')</script>";
            echo "<script>window.location = 'chatlist.php'</script>";
            die();
        }
        $check_idPeople = mysqli_query($conn, "SELECT id FROM account WHERE id=$idPeople");
        if(mysqli_num_rows($check_idPeople) == 0) {
            echo "<script>alert('Currently there is no people with this id!')</script>";
            echo "<script>window.location = 'chatlist.php'</script>";
            die();
        }
        $get_allprofile_result = mysqli_query($conn, "SELECT * FROM account WHERE id=$idPeople");
        $check_chatlist_duplicate = mysqli_query($conn, "SELECT * FROM `$chatlist` WHERE id=$idPeople");
        $people = mysqli_fetch_row($get_allprofile_result);
        $chatlist_other_people = "chatlist_" . $people[2];
        $check_chatlist_duplicate_people = mysqli_query($conn, "SELECT * FROM `$chatlist_other_people` WHERE id=$idPeople");
        $add_people_db = mysqli_query($conn,"INSERT INTO `$chatlist` VALUES('$people[1]', '$idPeople')");
        $add_other_people_db = mysqli_query($conn,"INSERT INTO `$chatlist_other_people` VALUES('$pfp[1]', '$pfp[0]')");
        if(mysqli_num_rows($check_chatlist_duplicate) || mysqli_num_rows($check_chatlist_duplicate_people)) {
            echo "<script>alert('You have already added this fried!')</script>";
            echo "<script>window.location = 'chatlist.php'</script>";
            die();
        } else {
            if($add_people_db) {
                echo "<script>alert('Added! Now you can chat with your friend!')</script>";
                echo "<script>window.location = 'chatlist.php'</script>";
            } else {
                echo "<script>alert('There is something wrong when adding your friend!')</script>";
                echo "<script>window.location = 'chatlist.php'</script>";
                die();
            }
        }
        

    }
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
        <dialog id="addPeople">
            <img src="image/Arrow 2.png" style="cursor: pointer; scale: 1.2;" onclick="addPeople.close()">
            <div class="addPeopleMain">
            <h3>Add more people!</h3>
            <p style="font-size:14px;">Enter your friends id in the form below to add them!</p>
            <form method="POST" action="" style="display: flex; align-items: center; flex-flow: row; gap: 10px;">
                <input name="idPeople" style="margin: 0;" type="text" placeholder="Ex.: 29">
                <input name="submitAddPeople" type="image" src="image/add.png">
            </form>
            </div>
        </dialog>
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
                <div class="profile" style="flex-flow: row; align-items: center; justify-content: space-between; padding-right: 20px">
                    <p style="font-size: 16px;">Select an user to chat</p>
                    <div style="display: flex; align-items: center; flex-flow: row; cursor: pointer;" onclick="addPeople.showModal()">
                        <p style="font-size: 16px; padding-right: 8px;">Add more people</p>
                        <img width="25" height="25" src="image/add.png">
                    </div>
                </div>
                <br>
                <div style="height: 300px; overflow-x: hidden;"> <!-- Chat list -->
                <?php
                    $get_chatlist = mysqli_query($conn, "SELECT * FROM `$chatlist`");
                    if(mysqli_num_rows($get_chatlist) > 0) {
                    while($row = mysqli_fetch_assoc($get_chatlist)) :
                        $id_chatlist = $row["id"];
                        $query_profile_people = mysqli_query($conn, "SELECT name,pfp,bio FROM account WHERE id=$id_chatlist");
                        $get_profile_people = mysqli_fetch_row($query_profile_people);
                        if($get_profile_people[1] == NULL) {
                            $get_profile_people[1] = "pfpPlaceholder.png";
                        }
                        if($get_profile_people[2] == NULL) {
                            $get_profile_people[2] = "Biography";
                        }
                ?>
                <div class="profile" style="flex-flow: row; cursor: pointer;">
                    <img style="border-radius: 50%; margin-left: 20px;" width="55" height="55" src="pfp/<?php echo $get_profile_people[1]; ?>">
                    <div style="width: 325px;">
                        <a href="chat.php<?php echo "?id=" . $id_chatlist; ?>" style="color: black;"><p><?php echo $row["name"]; ?></p></a>
                        <span style="color: rgba(0, 0, 0, 0.3);"><?php echo $get_profile_people[2]; ?></span>
                    </div>
                </div>
                <?php endwhile; } else { ?>

                <div class="profile" style="flex-flow: row; justify-content: center; align-item: center;">
                    <div style="width: 350px;">
                        <h3>You haven't added anyone in here, click on Add more people to add your friends! </h3>
                    </div>
                </div>
                <?php } ?>
                </div>
                
            </div>
        </div>
    </body>
</html>