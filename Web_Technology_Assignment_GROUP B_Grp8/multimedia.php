<?php
// Connection
$host = "localhost";
$user = "admin";
$pass = "bityear2@2024";
$database = "bityeartwo2024";
// Create the connection
$conn = new mysqli($host, $user, $pass, $database);
// Check if the connection passed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $conn->prepare("INSERT INTO multimedia (mid,userid, type, location, upload_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$mid, $userid, $type, $location, $upload_date);
    // Set parameters and execute
    $mid = $_POST['mid'];
    $userid = $_POST['userid'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $upload_date = $_POST['upload_date'];
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>


<?php
// Connection
$host = "localhost";
$user = "admin";
$pass = "bityear2@2024";
$database = "bityeartwo2024";
// Create the connection
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT*FROM multimedia";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Multimedia</title>
     <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Table of Multimedia</h2>
    
    <table id="dataTable">
        <tr>
            <th>Multid</th>
            <th>Userid</th>
            <th>Type</th>
            <th>Location</th>
            <th>Upload_date</th>
        </tr>   
         <?php
        // Output data of each row
        if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["mid"] . "</td><td>" . $row["userid"] . "</td><td>" . $row["type"] . "</td><td>" . $row["location"] . "</td><td>" . $row["upload_date"] .  "</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}
        ?>
    </table>
</body>
</html>

<?php
// Close connection
$conn->close();
?>


