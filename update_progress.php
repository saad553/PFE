<?php
include "db_connect.php"; // Including the database connection file

if (isset($_POST['course_id']) && isset($_POST['student_id'])) {
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];

    $sql = "INSERT INTO course_progress (Id_Cours, Id_Etudiant, progress) VALUES ('$course_id', '$student_id', 1) 
            ON DUPLICATE KEY UPDATE progress = progress";

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
