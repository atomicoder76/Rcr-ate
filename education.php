
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
        <span>Primary school : </span><input type="text" name="primaryschool"><br><br>
             <span>started :</span> <input type="date"  name= "startedatps"><br>
             <span>ended :</span> <input type="date"  name= "endedatps"><br>
        <span>Secondary school : </span><input type="text" name="secondaryschool"><br><br>
        <span>started :</span> <input type="date"  name= "startedatse"><br>
             <span>ended :</span> <input type="date"  name= "endedatse"><br>
        <span>Tertiary : </span><input type="text" name="tertiary"><br><br>
        
        <span>started :</span> <input type="date"  name= "startedatty"><br>
             <span>ended :</span> <input type="date"  name= "endedatty"><br>

        <button type="submit" onclick="redirectpage()">Submit</button>
    </form>
    <?php
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $primary = $secondary = $tertiary = $primaryst = $primaryend = $secondaryst = $secondaryend = $tertiaryst = $tertiaryend = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $primary = test_input($_POST["primaryschool"]);
  $secondary = test_input($_POST["secondaryschool"]);
  $tertiary = test_input($_POST["tertiary"]);
  $secondaryst = test_input($_POST["startedatse"]);
  $secondaryend = test_input($_POST["endedatse"]);
  $primaryst = test_input($_POST["startedatps"]);
  $primaryend = test_input($_POST["endedatps"]);
  $tertiaryst = test_input($_POST["startedatty"]);
  $tertiaryend = test_input($_POST["endedatty"]);


    

  $SQL = "INSERT INTO education (primarysc, startat1, endat1, Secondarysc, startat2, endat2, tertiary, startat3, endat3)
   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SQL);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssss", $primary, $primaryst, $primaryend,$secondary, $secondaryst, $secondaryend,
     $tertiary, $tertiaryst, $tertiaryend);
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