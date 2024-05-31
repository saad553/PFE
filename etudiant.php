<?php
include("db_connect.php");

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION['user_name'];
$student_query = "SELECT Id_Etudiant FROM etudiant WHERE Nom = '$user_name'";
$student_result = $conn->query($student_query);
$student_data = $student_result->fetch_assoc();
$student_id = $student_data['Id_Etudiant'];
?>

<!doctype html>
<html lang="en">
<head>
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
  <title>Edufso</title>
</head>
<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
  <div class="container">
    <nav class="site-nav">
      <div class="logo">
        <a href="#"><img class="khdmi" src=".\images\logo.png" alt="image-alterna"></a>
      </div>
      <div class="row align-items-center">
        <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
          <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
            <li class="active"><a href="etudiant.php">Home</a></li>
            <li><a href="">Messages</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>  
    </nav>
  </div>

  <div class="site-blocks-cover overlay" data-aos="fade" id="home-section">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12 mt-lg-5 text-center">
          <h1 data-aos="fade-up" class="mb-4">Student Dashboard</h1>
          <div class="row justify-content-around">
            <div class="col-lg-8">
              <?php echo '<p class="mb-5"  data-aos="fade-up" data-aos-delay="100">Voici '.$_SESSION['user_name'].', les cours auxquels vous êtes inscrit(e), ainsi que vos dernières mises à jour de progression et d\'autres informations importantes concernant votre parcours académique.</p>' ?>
            </div>
          </div>
          <div data-aos="fade-up" data-aos-delay="100">
            <a href="#course-container" class="btn btn-primary mr-2 mb-2">New Courses</a>
            <a href="#student-section" class="btn btn-primary mr-2 mb-2">My progress</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="khdmi2" id="student-section">    
    <?php
    $progress_query = "SELECT cp.progress, c.Titre_cours, c.Id_Cours, e.Nom AS teacher_name, e.Prenom AS teacher_firstname, 
                       (SELECT COUNT(DISTINCT l.Id_lesson) FROM lesson l WHERE l.Id_Cours = c.Id_Cours) AS lesson_count
                       FROM course_progress cp
                       JOIN cours c ON cp.Id_Cours = c.Id_Cours
                       JOIN enseignant e ON c.Id_Enseignant = e.Id_Enseignant
                       WHERE cp.Id_Etudiant = '$student_id'
                       GROUP BY cp.Id_Cours";
    $progress_result = $conn->query($progress_query);
    $courses_in_progress = [];
    while($progress_row = $progress_result->fetch_assoc()):
      $course_title = $progress_row['Titre_cours'];
      $teacher_name = $progress_row['teacher_firstname'] . " " . $progress_row['teacher_name'];
      $lesson_count = $progress_row['lesson_count'];
      $progress = $progress_row['progress'];
      $progress_percentage = $progress;
      $course_id=$progress_row['Id_Cours'];
      $courses_in_progress[] = $progress_row['Titre_cours'];
    ?>
      <div class="courses-container" data-course-id="<?php echo $course_id; ?>">
        <div class="courses-progress">
          <div class="progress" style="height: 30px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated courses-color" role="progressbar" aria-valuenow="<?php echo $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress_percentage; ?>%">
              <?php echo $progress_percentage; ?>%
            </div>
          </div>
        </div>
        <div class="courses-details">
          <p style="margin-bottom: 0px; font-size:18px;"><?php echo $course_title; ?></p>
          <p style="color: #607CB1; font-size:12px; margin-bottom: 0px;">Parties 0/<?php echo $lesson_count; ?></p>
          <p style="font-size:10px;"><?php echo $teacher_name; ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <?php
  $courses_in_progress_str = implode("', '", $courses_in_progress);
  $query = "SELECT cours.Id_Cours, cours.Titre_cours, cours.Course_Image, enseignant.Nom AS teacher_name, enseignant.Prenom AS teacher_firstname, 
            (SELECT COUNT(DISTINCT lesson.Id_lesson) FROM lesson WHERE lesson.Id_Cours = cours.Id_Cours) AS lesson_count 
            FROM cours
            INNER JOIN enseignant ON cours.Id_Enseignant = enseignant.Id_Enseignant
            WHERE cours.Titre_cours NOT IN ('$courses_in_progress_str')
            GROUP BY cours.Id_Cours";
  $result = $conn->query($query);
  ?>

  <div id="course-container">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="course" id="course-<?php echo $row['Id_Cours']; ?>" data-course-id="<?php echo $row['Id_Cours']; ?>">
        <?php
        $imageData = base64_encode($row['Course_Image']);
        $src = 'data:image/jpeg;base64,' . $imageData;
        ?>
        <div style="padding-bottom: 20px;"><img src="<?php echo $src; ?>" alt="Course Image"></div>
        <h3><?php echo $row['Titre_cours']; ?></h3>
        <p>Lessons: <?php echo $row['lesson_count']; ?></p>
        <p>Teacher: <?php echo $row['teacher_firstname'] . " " . $row['teacher_name']; ?></p>
      </div>
    <?php endwhile; ?>
  </div>

  <div class="site-footer">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4">
          <div class="widget">
            <h3>About</h3>
            <p>We aim for a better learning experience</p>
          </div>
          <div class="widget">
            <h3>Connect with us</h3>
            <ul class="social list-unstyled">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6"></div>
      </div>
      <div class="row justify-content-center text-center copyright">
        <div class="col-md-8"></div>
      </div>
    </div>
  </div>

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
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.course, .courses-container').forEach(function(course) {
      course.addEventListener('click', function() {
        const courseId = this.getAttribute('data-course-id');
        const studentId = '<?php echo $student_id; ?>';
        window.location.href = 'course.php?course_id=' + courseId;

        if (studentId) {
          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'update_progress.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
              document.getElementById('course-' + courseId).remove();
              addProgressBar(courseId);
            }
          };
          xhr.send('course_id=' + courseId + '&student_id=' + studentId);
        } else {
          alert('Student ID not available');
        }
      });
    });
  });

  function addProgressBar(courseId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_progress.php?course_id=' + courseId + '&student_id=<?php echo $student_id; ?>', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById('student-section').innerHTML += xhr.responseText;
      }
    };
    xhr.send();
  }
  </script>
</body>
</html>
