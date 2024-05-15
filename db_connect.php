<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Assuming password is empty
$database = "projet";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["user_id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userType = ($userId === "teacher") ? "teacher" : "student";

    // Select the table based on user type
    $table = ($userType === "teacher") ? "enseignant" : "etudiant";

    // Prepare SQL statement to retrieve user data
    $sql = "SELECT * FROM $table WHERE Email = '$email' AND Mot_de_Passe = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User found, login successful
        // Redirect user based on user type
        if ($userType === "teacher") {
            header("Location: enseignant.php");
            exit; // Ensure that script execution stops after redirecting
        } elseif ($userType === "student") {
            header("Location: etudiant.php");
            
            exit; // Ensure that script execution stops after redirecting
        }
    } else {
        // User not found or incorrect credentials
        
        echo "Invalid email or password for $userType.";
    }
}

// Close connection
$conn->close();
?>
