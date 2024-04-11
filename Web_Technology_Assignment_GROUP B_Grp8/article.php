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
    $stmt = $conn->prepare("INSERT INTO article(userid,title,contents,dateofcreation) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $userid, $title, $contents, $dateofcreation);
    // Set parameters and execute
    $userid = $_POST['userid'];
    $title = $_POST['title'];
    $contents = $_POST['content'];
    $dateofcreation = $_POST['doc'];
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

$sql = "SELECT*FROM article";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Article</title>
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
    <h2>Table of Article Data</h2>
    
    <table id="dataTable">
        <tr>
            <th>userid</th>
            <th>title</th>
            <th>contents</th>
            <th>dateofcreation</th>
        </tr>
         <?php
        // Output data of each row
        if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["userid"] . "</td><td>" . $row["title"] . "</td><td>" . $row["contents"] . "</td><td>" . $row["dateofcreation"] .  "</td></tr>";
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

