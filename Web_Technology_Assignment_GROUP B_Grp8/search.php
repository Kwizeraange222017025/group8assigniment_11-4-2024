<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Search Results</h2>

    <?php
    // Check if the search query is present
    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $search_query = $_GET['query'];
        // Fetch data from your database or perform any other search operations
        // Here we are just displaying the search query
        echo "<p>You searched for: <strong>$search_query</strong></p>";
    } else {
        // If no search query is present, display a message
        echo "<p>No search query provided.</p>";
    }
    ?>
</div>

</body>
</html>
