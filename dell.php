<?php
// Set up the database connection details
$host = "localhost";  // MySQL server address
$username = "tanfihruser";         // MySQL username
$password = "_lxY(4IGD3V}";             // MySQL password (empty for local)
$dbname = "TnN€0aQddHR";

try {
    // Create a new PDO instance with MySQL connection details
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";  // DSN (Data Source Name)
    $pdo = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Application Connected to the MySQL database successfully!";  // Connection successful message

} catch (PDOException $e) {
    // Catch connection error and display the error message
    echo "Connection failed: " . $e->getMessage();
}
?>

==================================
<?php
// Database connection details
$host = "localhost";
$username = "muthusoftlabs_hackathon";
$password = "viE2wSZo+PIm";
$dbname = "muthusoftlabs_hackathon";

// HTML styles for visual feedback
$successStyle = "color: green; font-weight: bold; font-family: Arial;";
$errorStyle = "color: red; font-weight: bold; font-family: Arial;";

try {
    // Create a new PDO instance with MySQL connection details
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Success message with green tick
    echo "<p style='$successStyle'>✅ Application Connected to the MySQL database successfully!</p>";

} catch (PDOException $e) {
    // Error message with red cross
    echo "<p style='$errorStyle'>❌ Connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
