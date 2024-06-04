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
        /* Your existing CSS styles */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');
        .circle-wrap {
            display: flex;
            grid-template-columns: repeat(1, 160px);
            grid-gap: 80px;
            margin-top: 100px;
            margin-left: 50px;
            width: 150px;
            height: 150px;
            background: #d9d7da;
            margin-right: 90px;
            border-radius: 50%;
        }

        .circle-wrap .circle .mask,
        .circle-wrap .circle .fill-1,
        .circle-wrap .circle .fill-2,
        .circle-wrap .circle .fill-3 {
            width: 150px;
            height: 150px;
            position: absolute;
            border-radius: 50%;
        }

        .circle-wrap .circle .mask {
            clip: rect(0px, 150px, 150px, 75px);
        }

        .circle-wrap .inside-circle {
            width: 124px;
            height: 124px;
            border-radius: 50%;
            background: #212020;
            line-height: 120px;
            text-align: center;
            margin-top: 13px;
            margin-left: 13px;
            color: white;
            position: absolute;
            z-index: 100;
            font-weight: 700;
            font-size: 2em;
        }

        /* color animation */

        .mask .fill-1 {
            clip: rect(0px, 75px, 150px, 0px);
            background-color: #607CB1;
        }

        .mask.full-1,
        .circle .fill-1 {
            animation: fill-1 ease-in-out 3s;
            transform: rotate(153deg);
            size: 20%;
        }

        @keyframes fill-1 {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(153deg);
            }
        }

        /* 2nd bar */

        .mask .fill-2 {
            clip: rect(0px, 75px, 150px, 0px);
            background-color: #607CB1;
        }

        .mask.full-2,
        .circle .fill-2 {
            animation: fill-2 ease-in-out 3s;
            transform: rotate(117deg);
        }

        @keyframes fill-2{
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(117deg);
            }
        }

        /* 3rd progress bar */
        .mask .fill-3 {
            clip: rect(0px, 75px, 150px, 0px);
            background-color: #607CB1;
        }

        .mask.full-3,
        .circle .fill-3 {
            animation: fill-3 ease-in-out 3s;
            transform: rotate(135deg);
        }

        @keyframes fill-3{
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(135deg);
            }
        }

        /* Additional styles for the statistics section and course cards */

        .statistics-section {
            margin-top: 50px;
            text-align: center;
            height: 500px;
        }

        .bar-chart {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            height: 100%;
            width: 80%;
            margin: 0 auto;
            background-color: #f0f0f0;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            bottom: 100%;
        }

        .bar {
            width: 50px;
            bottom: 100%;
            background: linear-gradient(to bottom, #607CB1, #1c394d);
            color: white;
            box-shadow: 0px 0px 10px  rgba(0, 0, 0, 0.1);
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
        .course-details-right-container{
            flex: 2.5;
            justify-items: center;
            text-align: center;
            margin-top:5%;
            margin-bottom:5%;
            align-content: center;

        }

        .img_next{
            width: 30px;
            height: 30px;
            align-self: center;

            margin: 5%;
            transition-timing-function: ease-in-out;
            transition-duration: 0.2s;

        }
        .img_next:hover{
            transition-timing-function: ease-in-out;
            transform: scale(1.1);
            transition-duration: 0.2s;
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
            font-size:80%;
            font-weight:bold ;
        }
        .course-instructor {
            margin: 1%;
            font-weight:200;
            color:#6D6D6D;
            font-size: small;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="images/Purple Blur Gradient Glass Effect Tweet Motivational Quote Instagram Post (4).png" sizes="64x64">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_enseignant.css">
    <title>Edufso</title>
</head>
<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">

<div class="container">
    <nav class="site-nav">
        <div class="logo">
            <a href="#"><img class="khdmi" src="./images/logo.png" alt="image-alterna"></a>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li class="active"><a href="enseignant.php">Home</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav> <!-- END nav -->

</div> <!-- END container -->

<div class="site-blocks-cover overlay" data-aos="fade" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 mt-lg-5 text-center">
                <div class="TextCours">
                    <div class="button-container">
                        <button id="createCourseButton" class="btn btn-primary mr-2 mb-2" onclick="showAddCourseForm()" style=" text-align: center; margin-top: 20px;">Ajoute un cours</button>
                    </div>
                </div>
                <div class="TextCourses">
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
                            $nom_enseignant = $row['Nom'];
                            $prenom_enseignant = $row['Prenom'];

                            $query = "SELECT * FROM cours WHERE Id_Enseignant = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param('i', $id_enseignant);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="course-card">';
                                    echo '<div class="course-image">';
                                    $imageData = base64_encode($row['Course_Image']);
                                    $src = 'data:image/jpeg;base64,' . $imageData;
                                    echo '<img src="' . $src . '" alt="Course Image" id="cours' . $row['Id_Cours'] . '">';
                                    echo '</div>';
                                    echo '<div class="course-details">';
                                    echo '<div class="course-details-left-container">';
                                    echo '<h3 class="course-title">' . $row['Titre_cours'] . '</h3>';
                                    echo '<p class="course-instructor">Mr ' . $user_name . ' ' . $prenom_enseignant . '</p>';
                                    echo '<p class="course-parts">Parts: 3</p>';
                                    echo '</div>';
                                    echo '<div class="course-details-right-container">';
                                    echo '<a href="#Modifier" class="edit-button" onclick="editCourse(' . $row['Id_Cours'] . ')"><img src="images/pen.png" alt="Pen" class="img_pen"></a>';
                                    echo '<a href="#Supprimer" class="delete-button" onclick="deleteCourse(' . $row['Id_Cours'] . ')"><img src="images/garbage.png" alt="Garbage" class="img_garbage"></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p style="color: white">No courses found for this teacher.</p>';
                            }
                        } else {
                            echo "Teacher not found.";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
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

    <button class="btn btn-primary mr-2 mb-2" type="submit">Add</button>
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

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
