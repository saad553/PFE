<?php
include("db_connect.php");

if (!isset($_GET['lesson_id'])) {
    echo "Lesson ID not provided.";
    exit;
}

$lesson_id = intval($_GET['lesson_id']);

// Fetch lesson content
$lesson_query = "SELECT file_lesson FROM lesson WHERE Id_lesson = $lesson_id";
$lesson_result = $conn->query($lesson_query);
if ($lesson_result->num_rows > 0) {
    $lesson = $lesson_result->fetch_assoc();
    echo nl2br($lesson['file_lesson']);
} else {
    echo "Lesson not found.";
}
?>
