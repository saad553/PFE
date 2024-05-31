<?php
include "db_connect.php"; // Including the database connection file

if (isset($_POST['course_id']) && isset($_POST['student_id'])) {
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];

    // Check if the progress already exists
    $check_query = "SELECT progress FROM course_progress WHERE Id_Cours = '$course_id' AND Id_Etudiant = '$student_id'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Progress exists, update it
        $sql = "UPDATE course_progress SET progress = progress + 1 WHERE Id_Cours = '$course_id' AND Id_Etudiant = '$student_id'";
    } else {
        // Progress does not exist, insert new record
        $sql = "INSERT INTO course_progress (Id_Cours, Id_Etudiant, progress) VALUES ('$course_id', '$student_id', 1)";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Progress updated successfully";
    } else {
        error_log("Error updating progress: " . $conn->error);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
