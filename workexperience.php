
<?php include("dn.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <button id="addbutton" >add +</button><br>
    <div id = "formcontainer" ></div>
    <div id = 'view'>
       
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
    </form>


    <?php
    $companyname = $workedas = $start = $end = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $companyname = test_input($_POST["workxp"]);
  $workedas = test_input($_POST["workedas"]);
  //$start = test_input($_POST["start"]);
  $end = test_input($_POST["end"]);
 
  if (isset($_POST['start'])) {
    $start = htmlspecialchars($_POST['start']);
} else {
    $start = '';  // Or handle this case appropriately
    echo "Start date not provided!<br>";
}

  $SQL = "INSERT INTO workxp (companyname, workedas, start, end)
   VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $SQL);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    mysqli_stmt_bind_param($stmt, "ssss", $companyname, $workedas, $start, $end);

    if(mysqli_stmt_execute($stmt)) {
        echo "connected";
    }
    else {
        echo "failed" . mysqli_stmt_error($conn);
    }


$stmtt = mysqli_prepare($conn, 'SELECT companyname, workedas, start, end FROM workxp');
        mysqli_stmt_execute($stmtt); 
        mysqli_stmt_bind_result($stmtt, $companynamedb, $workedasdb, $startdb, $enddb);

        echo "<h2>Work Experience:</h2>";
    echo "<ul>";
    while (mysqli_stmt_fetch($stmtt)) {
        echo "<li>Company: $companynamedb, Worked As: $workedasdb, Start: $startdb, End: $enddb</li>";
    }
    echo "</ul>";

    mysqli_stmt_close($stmtt);

    $id = $stmt->insert_id;

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to view_cv.php with the inserted ID
    header("Location: my_cv.php?id=" . $id);
    exit;

}
 


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<script src="js/app.js">

</script>
</body>

</html>