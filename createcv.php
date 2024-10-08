
<?php include("dn.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="navbar">
        <h2 class="heading">Rotondwa's cv creator.!</h2>
    <div>
        <a href="my_cv.php">my cv</a>
        <a href="update.php">Update cv</a>
        <a href="bio.php">biological info</a>
        <a href="education.php">education</a>
        <a href="workexperience.php">workexperience</a>
    </div>
    </div>
    <h1 style="text-align:center">create your cv here.</h1>

    <div class="updatechoice">
        <a href="#" id="back">></a>
        <a href="createcv.php" >bio info</a>
        <a href="education.php" >education</a>
        <a href="workexperience.php" >workexperience</a>
        <a href=" " id="forwar̥ḍ"><</a>
        
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>Firstname : </span><input type="text" name="firstName"><br><br>
        <span>Secondname : </span><input type="text" name="secondName"><br><br>
        <span>Surname : </span><input type="text" name="surName"><br><br>
        <span>Dateofbirth : </span><input type="text" name="dateOfBirth"><br><br>
        <span>Gender : </span>
        <select name="Gender" id="genderchoice">
            <option value="Male">Male</option>
            <option value="female">Female</option>
            <option value="orther">orther</option>
        </select>
        <button type="submit" onclick="redirectpage()">Submit</button>
    </form>
    <?php
    $frstname = $sndname = $surname = $dob = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["firstName"]);
  $Secondname = test_input($_POST["secondName"]);
  $surname = test_input($_POST["surName"]);
  $dateofbirth = test_input($_POST["dateOfBirth"]);
  $gender = test_input($_POST["Gender"]);

  $SQL = "INSERT INTO Biological_info (Firstname, Secondname, Surname, Gender, Dateofbirth)
   VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SQL);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $name, $Secondname, $surname, $dateofbirth, $gender);

   

   $stmt->execute();
   

   
} 


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>