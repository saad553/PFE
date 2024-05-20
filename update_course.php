<?php
include("db_connect.php");

// Set the content type to JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Logs pour débogage
    error_log("POST data: " . print_r($_POST, true));
    error_log("FILES data: " . print_r($_FILES, true));

    $courseId = isset($_POST['course_id']) ? $_POST['course_id'] : null;
    $courseTitle = isset($_POST['course-title']) ? $_POST['course-title'] : null;

    if ($courseId && $courseTitle) {
        // Mettre à jour le titre du cours
        $updateCourseQuery = "UPDATE cours SET Titre_cours = ? WHERE Id_Cours = ?";
        $stmt = $conn->prepare($updateCourseQuery);
        if (!$stmt) {
            echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
            exit;
        }
        $stmt->bind_param('si', $courseTitle, $courseId);
        $stmt->execute();

        // Mettre à jour les leçons
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'lesson-title-') !== false) {
                $lessonId = str_replace('lesson-title-', '', $key);
                $lessonTitle = $value;

                // Mettre à jour le titre de la leçon
                $updateLessonQuery = "UPDATE lesson SET Titre_lesson = ? WHERE Id_lesson = ?";
                $stmt = $conn->prepare($updateLessonQuery);
                if (!$stmt) {
                    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
                    exit;
                }
                $stmt->bind_param('si', $lessonTitle, $lessonId);
                $stmt->execute();

                // Mettre à jour le fichier de la leçon si un fichier est téléchargé
                if (isset($_FILES['lesson-file-' . $lessonId]) && $_FILES['lesson-file-' . $lessonId]['error'] == 0) {
                    $fileTmpPath = $_FILES['lesson-file-' . $lessonId]['tmp_name'];
                    $fileName = $_FILES['lesson-file-' . $lessonId]['name'];
                    $fileDestPath = 'uploads/' . $fileName;

                    move_uploaded_file($fileTmpPath, $fileDestPath);

                    $updateLessonFileQuery = "UPDATE lesson SET file_lesson = ? WHERE Id_lesson = ?";
                    $stmt = $conn->prepare($updateLessonFileQuery);
                    if (!$stmt) {
                        echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
                        exit;
                    }
                    $stmt->bind_param('si', $fileDestPath, $lessonId);
                    $stmt->execute();
                }
            }
        }
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Invalid course data.']);
    }
} else {
    error_log("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(['error' => 'Invalid request']);
}
?>
