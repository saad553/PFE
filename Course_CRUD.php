<?php
include("db_connect.php");
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edufso</title>
    <link rel="stylesheet" href="css/style_enseignant.css">
</head>
<body>
    <div class="container">
        <nav class="site-nav">
            <div class="logo">
                <a href="index.html"><img class="khdmi" src="Untitled design.png" alt="image-alterna"></a>
            </div>
            <div class="header-links">
                <a href="enseignant.php">Home</a>
                <a href="#">About Us</a>
                <a href="enseignant.php">Cours</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
        <header class="header">
            <h1>Our Courses</h1>
        </header>
        
        <div class="TextCours">
            <h3>Explore our wide range of courses and expand your knowledge in various domains.</h3>
            <div class="button-container">
                <button id="createCourseButton" onclick="showAddCourseForm()"style=" text-align: center;
    margin-top: 20px;">Ajoute un cours</button>
            </div>
        </div>
        <div class="TextCourses">
            <h1>Explore Your Courses</h1>
            <div class="CoursesContainer">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projet";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $user_name = $_SESSION['user_name'];

                $query = "SELECT Id_Enseignant, Nom, Prenom FROM enseignant WHERE Nom = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('s', $user_name);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id_enseignant = $row['Id_Enseignant'];
                    $nom_enseignant=$row['Nom'];
                    $prenom_enseignant=$row['Prenom'];

                    $query = "SELECT * FROM cours WHERE Id_Enseignant = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $id_enseignant);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="course-card">';
                            echo     '<div class="course-image">';
                            $imageData = base64_encode($row['Course_Image']);
                            $src = 'data:image/jpeg;base64,' . $imageData;
                            echo         '<img src="'.$src.'" alt="Course Image" id="cours'.$row['Id_Cours'].'">';
                            echo     '</div>';
                            echo     '<div class="course-details">';
                            echo         '<div class="course-details-left-container">';
                            echo             '<h3 class="course-title">'.$row['Titre_cours'].'</h3>';
                            echo             '<p class="course-instructor">Mr '.$user_name.' '.$prenom_enseignant.'</p>';
                            echo             '<p class="course-parts">Parts: 3</p>';
                            echo         '</div>';
                            echo         '<div class="course-details-right-container">';
                            echo             '<a href="#Modifier" class="edit-button" onclick="editCourse('.$row['Id_Cours'].')"><img src="images/pen.png" alt="Pen" class="img_pen"></a>';
                            echo             '<a href="#Supprimer" class="delete-button" onclick="deleteCourse('.$row['Id_Cours'].')"><img src="images/garbage.png" alt="Garbage" class="img_garbage"></a>';
                            echo         '</div>';
                            echo     '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No courses found for this teacher.";
                    }
                } else {
                    echo "Teacher not found.";
                }
                $conn->close();
                ?>
            </div>
        </div>

    </div>
     <!-- Add Course Form -->
     <form id="addCourseForm" style="display:none;" enctype="multipart/form-data" method="post" action="add_course.php">
            <h2>Add a Course</h2>
            <label for="course-title">Course Title</label>
            <input type="text" id="course-title" name="course-title" required>

            <label for="lesson-count">Number of Lessons</label>
            <input type="number" id="lesson-count" name="lesson-count" min="1" required oninput="generateLessonFields()">

            <label for="course-image">Course Image</label>
            <input type="file" id="course-image" name="course-image" accept="image/*" required>

            <div id="dynamicFieldsContainer"></div>
            
            <button type="submit">Add</button>
        </form>
    <script>
        function showAddCourseForm() {
    document.getElementById('addCourseForm').style.display = 'block';
}

function generateLessonFields() {
    const lessonCount = document.getElementById('lesson-count').value;
    const container = document.getElementById('dynamicFieldsContainer');
    container.innerHTML = ''; // Clear any existing fields

    for (let i = 0; i < lessonCount; i++) {
        const lessonTitle = document.createElement('input');
        lessonTitle.type = 'text';
        lessonTitle.name = `lesson_title_${i + 1}`;
        lessonTitle.placeholder = `Lesson Title ${i + 1}`;
        lessonTitle.required = true;

        const lessonContent = document.createElement('textarea');
        lessonContent.name = `lesson_content_${i + 1}`;
        lessonContent.placeholder = `Lesson Content ${i + 1}`;
        lessonContent.required = true;

        container.appendChild(lessonTitle);
        container.appendChild(lessonContent);
    }
}

function editCourse(courseId) {
    // Show the edit course form and populate it with existing data
    document.getElementById('editCourseForm').style.display = 'block';
    // Fetch and populate the course details using AJAX (implementation not shown here)
}

function deleteCourse(courseId) {
            if (confirm('Are you sure you want to delete this course?')) {
                fetch('delete_course.php?course_id=' + courseId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Course deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting course: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting course:', error);
                        alert('Network error: ' + error.message);
                    });
            }
        }


    </script>
</body>
</html>
