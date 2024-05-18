<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
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
    $userType = ($userId === "enseignant") ? "enseignant" : "etudiant";
    
    $sql = "SELECT * FROM $userType WHERE Email = '$email' AND Mot_de_Passe = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User found, login successful
        // Redirect user based on user type
          // User found, login successful
          $user = $result->fetch_assoc(); // Fetch data of the user
          $_SESSION['user_name'] = $user['Nom']; // Store user name in session
          $_SESSION['user_type'] = $userType; // Store user type in session
        if ($userType === "enseignant") {
            header("Location: enseignant.php");
            exit; // Ensure that script execution stops after redirecting
        } elseif ($userType === "etudiant") {
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
