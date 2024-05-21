<?php

include('db_connect.php'); // Your database connection file

if (isset($_POST['course_id']) && isset($_POST['progress'])) {
    $course_id = $_POST['course_id'];
    $progress = $_POST['progress'];
    $student_id = $_SESSION['user_name']; // Assuming student ID is stored in session

    // Check if the progress record already exists
    $query = "SELECT * FROM course_progress WHERE Id_Cours = ? AND Id_Etudiant = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $course_id, $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $query = "UPDATE course_progress SET progress = ? WHERE Id_Cours = ? AND Id_Etudiant = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $progress, $course_id, $student_id);
    } else {
        // Insert new record
        $query = "INSERT INTO course_progress (Id_Cours, Id_Etudiant, progress) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $course_id, $student_id, $progress);
    }

    if ($stmt->execute()) {
        // Redirect back to the main page after successful update
        header("Location: main_page.php");
        exit();
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid input';
}
?>
