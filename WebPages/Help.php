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
  $usersql = "SELECT `username` FROM `users` WHERE `id` = $current_user";
  $userresult = $conn->query($usersql);
  $userrow = $userresult->fetch_assoc();
  $current_username = $userrow["username"];
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style type="text/css">
        #background{
            margin: 0 auto;
            background-color: rgb(137, 207, 240);
            box-shadow: 0px 5px 5px #549abb;
            border: 5px solid rgb(200, 220, 240, 0.7);
            height: 35em;
            width: 60em;
            padding-top: 1.75em;
            padding-left: 0.3em;
        }

        #insideBox{
            margin: 0 auto;
            height: 31em;
            width: 56em;
            border: 2px solid darkgrey;
            background-color: white;
            padding: 25px;
            text-align: center;
        }
        h1, p{
            color: rgb(137, 207, 240);
        }
      </style>
    <meta charset="UTF-8">
    <title>Help Page</title>
  </head>
  <body>
    <div class="navbar"> 
        <ul>
            <li><a href="WordCloud.php">Word Cloud</a></li>
            <li><a href="Diary.php">Diary</a></li>
            <li><a href="Calendar.html">Calendar</a></li>
            <li><a href="MoodTracker.php">Mood Tracker</a></li>
            <li><a href="Resources.php">Resources</a></li>
            <li><a href="Help.php">Help</a></li>
            <li><a href="AboutUs.html">About Us</a></li>
            <li style="float:right"><a class="active" href="Profile.php"><?php echo $current_username ?></a></li>
        </ul>
    </div>
    <br><br><br>
    <div id="background">
        <div id="insideBox">
            <h1>Introduction to the website</h1>
            <p> This website aims to support people in need of mental support. We designed this website
                in order to make sure that all people who use this can see improvments in their mental health.
                The importance of mental stability has to be everyone's main priority, since mental health includes
                our emotional, psychological, and social well-being. We as a group understand the importance and
                aim to support you. </p>
            <br>
            <div id="videoId">
                <video  controls autoplay >
                    <source src="test.mp4" type="video/mp4">
                </video>
            </div>
            <br>
            <p id="first">Got any feedback?<a href="FeedbackForm.html"> Send us Feedback form!</a></p>
        </div>
    </div>
  </body>
</html>
