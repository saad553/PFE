<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

include("db_connect.php");

$courseId = $_GET['course_id'];

$query = "DELETE FROM lesson WHERE Id_Cours = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $courseId);
$stmt->execute();

$query = "DELETE FROM cours WHERE Id_Cours = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $courseId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}
$stmt->close();
$conn->close();
?>
