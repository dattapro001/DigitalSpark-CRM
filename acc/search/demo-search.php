<?php 

// Connection to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search query
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM users WHERE fname LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Search results:</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='result-item'>" . $row['fname'] . "</div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
}

$conn->close();
?>