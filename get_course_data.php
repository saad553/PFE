<?php
include("db_connect.php"); // Assurez-vous que ce fichier contient la connexion à la base de données

// Vérifiez si l'ID du cours est passé en paramètre
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Créez une connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparez la requête SQL pour récupérer les informations du cours
    $query = "SELECT Titre_cours FROM cours WHERE Id_Cours = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        $courseTitle = $course['Titre_cours'];

        // Préparez la requête SQL pour récupérer les leçons du cours
        $query = "SELECT Id_lesson, Titre_lesson FROM lesson WHERE Id_Cours = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $course_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $lessons = [];
        while ($row = $result->fetch_assoc()) {
            $lessons[] = [
                'id' => $row['Id_lesson'],
                'title' => $row['Titre_lesson']
            ];
        }

        // Renvoyez les données sous forme de JSON
        echo json_encode([
            'courseTitle' => $courseTitle,
            'lessons' => $lessons
        ]);
    } else {
        echo json_encode(['error' => 'Cours non trouvé.']);
    }

    // Fermez la connexion à la base de données
    $conn->close();
} else {
    echo json_encode(['error' => 'ID du cours non spécifié.']);
}
?>
