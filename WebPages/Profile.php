<?php
    session_start();
    $current_user = $_SESSION["user_id"];
    
    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "n00575sm";
    $database_pass = "Mozzer_2310";
    $database_name = "2020_comp10120_x6";
    
    $conn = mysqli_connect($database_host,$database_user,$database_pass,$database_name);

    if (!$conn){
        die("connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `users` WHERE `id` = $current_user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $current_username = $row["username"];
    $current_email = $row["email"];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link
          href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"
        />
        <meta charset="UTF-8">
        <title>Profile</title>
        <style type="text/css">
            #background{
                margin: 0 auto;
                background-color: rgb(137, 207, 240);
                box-shadow: 0px 5px 5px #549abb;
                border: 5px solid rgb(200, 220, 240, 0.7);
                border-radius: 10px;
                height: 30em;
                width: 60em;
                padding-top: 1.75em;
                padding-left: 0.3em;
            }

            #insideBox{
                margin: 0 auto;
                height: 26em;
                width: 56em;
                border: 2px solid darkgrey;
                border-radius: 10px;
                background-color: white;
                padding: 25px;
                text-align: center;
            }
            #insideBox2{
                margin: 0 auto;
                height: 13em;
                width: 28em;
            }
            h1, label{
                color: rgb(137, 207, 240);
            }
            .leftLabel{
                float: left;
            }
            .rightLabel {
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="navbar"> 
        <ul>
            <img src="images/cloudu_white.svg" width="100" height="50" style="float:left; padding: 3px 0px 0px 0px" > 
            <li><a href="WordCloud.php">Word Cloud</a></li>
            <li><a href="Diary.php">Diary</a></li>
            <li><a href="Calendar.html">Calendar</a></li>
            <li><a href="MoodTracker.php">Mood Tracker</a></li>
            <li><a href="Resources.php">Resources</a></li>
            <li><a href="Help.php">Help</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li style="float:right"><a class="logout" href="home.php">Logout</a></li>
            <li style="float:right"><a href="Profile.php"><?php echo $current_username ?></a></li>
        </ul>
        </div>
        <br><br><br><br><br><br>
        <div id="background">
            <div id="insideBox">
                <h1 id="title">Profile</h1>
                <br><br><br><br><br>
                <div id="insideBox2">
                    <label class="leftLabel">Username:</label><label class="rightLabel" id="username">Test</label>
                    <br><br><br>
                    <label class="leftLabel">E-Mail:</label><label class="rightLabel" id="email">Test</label>
                </div>
                <button onclick="location.href='ProfileEdit.php'">Edit Account Details</button>
            </div>
        </div>  

        <script>
            var username = <?php echo json_encode($current_username);?>;
            var email = <?php echo json_encode($current_email);?>;

            document.getElementById("username").innerText = username;
            document.getElementById("email").innerText = email;

        </script>
    </body>
</html>
