<?php include ('dn.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>
<body>
    <div class="navbar">
        <h2 class="heading">Rotondwa's cv creator.!</h2>
        <div>
        <a href="my_cv.php">my cv</a>
        <a href="updatecv.php">Update cv</a>
        <a href="bio.php">biological info</a>
        <a href="education.php">education</a>
        <a href="workexperience.php">workexperience</a>
        </div>
    </div>
    <h1 style="text-align:center">welcome to Rotondwa's cv creator</h1><br>

    <p class="intro">
        I designed and implemented a comprehensive CV creator tool that allows users to easily create,
        update, delete, and view their professional resumes. 
        The application is built with a focus on user experience,
        providing intuitive features for managing and customizing CVs.
         This tool simplifies the process of maintaining up-to-date career documents,
        ensuring that users can present their qualifications and experience in the best possible light.
    </p><br><br>

    <div class="container">
        <div class="card">
            <a href="createcv.php" class="homebutton"><button class="homebutton" >create cv</button></a><br><br>
            <a href="update.php"><button class="homebutton">update existing</button></a><br><br>
            <a href="my_cv.php"><button class="homebutton">view existing</button></a><br><br>
        </div>
    </div>
</body>
</html>

