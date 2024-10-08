
<?php




// Include FPDF library and database connection
require('fdfp/fpdf.php');
include("dn.php");

ob_start();




if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the inserted data from the database
    $sql = "SELECT companyname, workedas, start, end FROM workxp WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Generate PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set title
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, "Curriculum Vitae");

        // Line break
        $pdf->Ln(20);

        // Set content for the CV
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, "Company Name: " . $row['companyname']);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Worked As: " . $row['workedas']);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Start Date: " . $row['start']);
        $pdf->Ln();
        $pdf->Cell(40, 10, "End Date: " . $row['end']);
        $pdf->Ln();
        ob_end_clean();
        // Output the PDF
        $pdf->Output();
    } else {
        echo "No data found for this ID.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
<form action="my_cv.php" method="get">
    <input type="text" name = "id" value = "" placeholder = "enter cv number">
    <button type="submit">submit</button>
</form>
</body>
</html>

