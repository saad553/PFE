<?php
include("db_connect.php");
if (!isset($_SESSION['user_name'])) {
    // Redirect to login page if the session is not set
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <style media="screen">
        /* Include your existing CSS styles here */
        /* Add the CSS you provided earlier */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .site-nav {
            border-style: groove;
            background-color: #1c394d;
            display: flex;
            flex-direction: column;
            height: 100px;
        }
        .header-links a {
            text-align: center;
            margin: 5%;
            color: white;
            text-decoration: none;
        }
        .header-links {
            flex: 6.5;
            text-align: center;
        }
        .logo {
            flex: 3.5;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #1c394d;
            color: white;
        }
        .TextCourses{
            display: flex;
            flex-direction: column;
            text-align: start;
            margin: 5%;
        }
        .CoursesContainer {
            width: 100%; /* Set a width */
            display: flex;
            flex-direction: row;
            justify-content: center; /* Adjust as needed */
            align-items: center;
            margin-top: 50px;
        }

        .course-card:hover {
            transition-timing-function: ease-in-out;
            transform: scale(1.01);
            transition-duration: 0.2s;
        }

        .course-card {
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 3%;
            overflow: hidden;
            margin: 10px;
            transition-timing-function: ease-in-out;
            transition-duration: 0.2s;
            margin: 2%;
        }

        .course-image img {
            width: 100%;
            height: auto;
            background-color: white;
        }

        .course-details {
            display: flex;
            flex-direction: row;
        }
        .course-details-left-container{
            flex: 7.5;
            display: flex;
            flex-direction: column;
            margin: 5%;
            margin-right: 0%;
        }
        .course-details-right-container {
            flex: 2.5;
            display: flex;
            flex-direction: column;
            justify-items: center;
            text-align: center;
            margin-top: 5%;
            margin-bottom: 5%;
            align-content: center;
            justify-content: center;
        }
        .img_garbage, .img_pen {
            width: 20px;
            height: 20px;
            align-self: center;
            margin: 16%;
            transition-timing-function: ease-in-out;
            transition-duration: 0.2s;
        }
        .img_garbage:hover, .img_pen:hover {
            transform: scale(1.1);
        }
        .course-title {
            margin-bottom: 5px;
            color: #333;
            font-size: large;
            font-weight: medium;
        }
        .course-parts {
            margin-bottom: 0;
            color: #4d7d22;
            font-size: 80%;
            font-weight: bold;
        }
        .course-instructor {
            margin: 1%;
            font-weight: 200;
            color: #6D6D6D;
            font-size: small;
        }
        /* Additional styles for dynamic form */
        #addCourseForm, #editCourseForm {
            display: none;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        #addCourseForm label, #editCourseForm label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        #addCourseForm input[type="text"],
        #addCourseForm input[type="number"],
        #addCourseForm input[type="file"],
        #editCourseForm input[type="text"],
        #editCourseForm input[type="number"],
        #editCourseForm input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #addCourseForm button[type="submit"],
        #editCourseForm button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        .dynamic-field {
            margin-bottom: 20px;
        }
        .dynamic-field label {
            font-weight: normal;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edufso</title>
</head>
<body>
    <div class="container">
        <nav class="site-nav">
            <div class="logo">
                <a href="index.html"><img class="khdmi" src="Untitled design.png" alt="image-alterna"></a>
            </div>
            <div class="header-links">
                <a href="index.html">Home</a>
                <a href="about.html">About Us</a>
                <a href="cours.html">Cours</a>
                <a href="contact.html">Contact Us</a>
            </div>
        </nav>
        <header class="header">
            <h1>Our Cours</h1>
        </header>
        <div class="TextCours">
            <h3>Explore our wide range of cours and expand your knowledge in various domains.</h3>
        </div>
        <div class="TextCourses">
            <h1>Explorer vos Cours</h1>
            <div class="CoursesContainer">
                <?php
                // Assurez-vous que ce fichier contient la connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projet";

                // Crée une connexion
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérifie la connexion
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Récupère le nom de l'utilisateur connecté
                $user_name = $_SESSION['user_name'];

                // Préparez la requête SQL pour récupérer l'ID de l'enseignant connecté
                $query = "SELECT Id_Enseignant FROM enseignant WHERE Nom = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('s', $user_name);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id_enseignant = $row['Id_Enseignant'];
                    
                    // Préparez la requête SQL pour récupérer les cours de cet enseignant
                    $query = "SELECT * FROM cours WHERE Id_Enseignant = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $id_enseignant);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Affichez les cours dans une boucle
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="course-card">';
                            echo     '<div class="course-image">';
                            echo         '<img src="images/C.jpg" alt="Course Image">';
                            echo     '</div>';
                            echo     '<div class="course-details">';
                            echo         '<div class="course-details-left-container">';
                            echo             '<h3 class="course-title">'.$row['Titre_cours'].'</h3>';
                            echo             '<p class="course-instructor">Mr '.$user_name.'</p>';
                            echo             '<p class="course-parts">Parties: 8</p>'; 
                            echo         '</div>';
                            echo         '<div class="course-details-right-container">';
                            echo             '<a href="#Modifier" class="edit-button" onclick="editCourse('.$row['Id_Cours'].')"><img src="images/pen.png" alt="Pen" class="img_pen"></a>';
                            echo             '<a href="#Supprimer" class="delete-button"><img src="images/garbage.png" alt="Garbage" class="img_garbage"></a>';
                            echo         '</div>';
                            echo     '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Aucun cours trouvé pour cet enseignant.";
                    }
                } else {
                    echo "Enseignant non trouvé.";
                }
                $conn->close();
                ?>
            </div>
        </div>

        <!-- Add Course Form -->
<form id="addCourseForm">
    <h2>Ajouter un Cours</h2>
    <label for="course-title">Titre du Cours</label>
    <input type="text" id="course-title" name="course-title" required>

    <!-- Add dynamic lesson fields here -->
    <div id="dynamicFieldsContainer">
        <!-- Example dynamic field -->
        <div class="dynamic-field">
            <label for="lesson-title-1">Titre de la Leçon 1</label>
            <input type="text" id="lesson-title-1" name="lesson-title-1" required>
            <label for="lesson-file-1">Fichier de la Leçon 1</label>
            <input type="file" id="lesson-file-1" name="lesson-file-1" required>
        </div>
    </div>
    <button type="button" id="addLessonField">Ajouter une Leçon</button>
    <button type="submit">Ajouter</button>
</form>


        <!-- Edit Course Form -->
<form id="editCourseForm" method="POST" enctype="multipart/form-data">
    <h2>Modifier un Cours</h2>
    <input type="hidden" id="edit-course-id" name="course_id">
    <label for="edit-course-title">Titre du Cours</label>
    <input type="text" id="edit-course-title" name="course-title" required>
    <div id="editDynamicFieldsContainer">

    </div>
    <button type="button" id="addEditLessonField">Ajouter une Leçon</button>
    <button type="submit">Modifier</button>
</form>


    </div>

    <script>
    function editCourse(courseId) {
    const form = document.getElementById('editCourseForm');
    form.style.display = 'block';

    // Effacer les anciens champs dynamiques
    const container = document.getElementById('editDynamicFieldsContainer');
    container.innerHTML = '';

    // Récupérer les données du cours
    fetch('get_course_data.php?course_id=' + courseId)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            document.getElementById('edit-course-title').value = data.courseTitle;

            // Ajouter dynamiquement les champs de leçon
            data.lessons.forEach((lesson, index) => {
                const lessonFieldHTML = `
                    <div class="dynamic-field">
                        <label for="edit-lesson-title-${index + 1}">Titre de la Leçon ${index + 1}</label>
                        <input type="text" id="edit-lesson-title-${index + 1}" name="lesson-title-${lesson.id}" value="${lesson.title}" required>
                        <label for="edit-lesson-file-${index + 1}">Fichier de la Leçon ${index + 1}</label>
                        <input type="file" id="edit-lesson-file-${index + 1}" name="lesson-file-${lesson.id}">
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', lessonFieldHTML);
            });
        })
        .catch(error => {
            console.error('Error fetching course data:', error);
        });
}



    // Fonction pour ajouter dynamiquement des champs de leçon dans le formulaire d'ajout
    document.getElementById('addLessonField').addEventListener('click', function () {
        const container = document.getElementById('dynamicFieldsContainer');
        const lessonCount = container.children.length + 1;
        const lessonFieldHTML = `
            <div class="dynamic-field">
                <label for="lesson-title-${lessonCount}">Titre de la Leçon ${lessonCount}</label>
                <input type="text" id="lesson-title-${lessonCount}" name="lesson-title-${lessonCount}" required>
                <label for="lesson-file-${lessonCount}">Fichier de la Leçon ${lessonCount}</label>
                <input type="file" id="lesson-file-${lessonCount}" name="lesson-file-${lessonCount}" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', lessonFieldHTML);
    });

    // Fonction pour ajouter dynamiquement des champs de leçon dans le formulaire de modification
    document.getElementById('addEditLessonField').addEventListener('click', function () {
        const container = document.getElementById('editDynamicFieldsContainer');
        const lessonCount = container.children.length + 1;
        const lessonFieldHTML = `
            <div class="dynamic-field">
                <label for="edit-lesson-title-${lessonCount}">Titre de la Leçon ${lessonCount}</label>
                <input type="text" id="edit-lesson-title-${lessonCount}" name="lesson-title-${lessonCount}" required>
                <label for="edit-lesson-file-${lessonCount}">Fichier de la Leçon ${lessonCount}</label>
                <input type="file" id="edit-lesson-file-${lessonCount}" name="lesson-file-${lessonCount}">
            </div>
        `;
        container.insertAdjacentHTML('beforeend', lessonFieldHTML);
    });

    // Gestion de la soumission des formulaires
    document.getElementById('addCourseForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Ajoutez ici votre code de soumission pour le formulaire d'ajout
    });

    document.getElementById('editCourseForm').addEventListener('submit', function (e) {
    e.preventDefault();

    console.log('Form submitted!'); // Ajouter un log pour vérifier la soumission

    const formData = new FormData(this);

    fetch('update_course.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Ajouter un log pour vérifier la réponse
        if (data.success) {
            alert('Cours mis à jour avec succès');
            location.reload(); // Recharger la page pour voir les modifications
        } else {
            alert('Erreur lors de la mise à jour du cours : ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error updating course:', error);
        alert('Erreur réseau : ' + error.message);
    });
});




</script>

</body>
</html>
