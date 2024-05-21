<?php
include("db_connect.php");
if (!isset($_SESSION['user_name'])) {
    // Redirect to login page if the session is not set
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="">Messages</a></li>
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
            <h1 data-aos="fade-up" class="mb-4">Student Dashboard</h1>

            <div class="row justify-content-around">
              <div class="col-lg-8">
            <?php  echo '<p class="mb-5"  data-aos="fade-up" data-aos-delay="100">Voici '.$_SESSION['user_name'].', les cours auxquels vous êtes inscrit(e), ainsi que vos dernières mises à jour de progression et d\'autres informations importantes concernant votre parcours académique.</p>'?>
              </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
              <a href="#courses-section" class="btn btn-primary mr-2 mb-2">New Courses</a>
              <a href="#student-section" class="btn btn-primary mr-2 mb-2">My progress</a>
            </div>
          </div>
            
        </div>

        
      </div>

      
    </div> 
    

  <div class="khdmi2" id="student-section">
    <div class="courses-container">
      <div class="courses-progress">
        <div class="progress" style="height: 30px; ">
      <div class="progress-bar progress-bar-striped progress-bar-animated courses-color" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
    </div></div>
    
    <div class="courses-details">
      <p style="margin-bottom: 0px; font-size:18px;">Javascript</p>
      <p style="color: #607CB1; font-size:12px; margin-bottom: 0px;">Parties 1/3</p>
      <p style="font-size:10px;">Pr Moussi</p>

    </div>

        </div>
        <div class="courses-container">
      <div class="courses-progress">
        <div class="progress" style="height: 30px; ">
      <div class="progress-bar progress-bar-striped progress-bar-animated courses-color" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
    </div></div>
    
    <div class="courses-details">
      <p style="margin-bottom: 0px; font-size:18px;">C</p>
      <p style="color: #607CB1; font-size:12px; margin-bottom: 0px;">Parties 1/5</p>
      <p style="font-size:10px;">Pr Moussi</p>

    </div>

        </div>
        <div class="courses-container">
      <div class="courses-progress">
        <div class="progress" style="height: 30px; ">
      <div class="progress-bar progress-bar-striped progress-bar-animated courses-color" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
    </div></div>
    
    <div class="courses-details">
      <p style="margin-bottom: 0px; font-size:18px;">Python</p>
      <p style="color: #607CB1; font-size:12px; margin-bottom: 0px;">Parties 5/5</p>
      <p style="font-size:10px;">Pr Moussi</p>

    </div>

        </div>
            
   
   </div> 
   <?php

// Query to fetch course details
$query = "SELECT cours.Id_Cours, cours.Titre_cours, enseignant.Nom AS teacher_name, enseignant.Prenom AS teacher_firstname, COUNT(lesson.Id_lesson) AS lesson_count 
          FROM cours
          LEFT JOIN lesson ON cours.Id_Cours = lesson.Id_Cours
          INNER JOIN enseignant ON cours.Id_Enseignant = enseignant.Id_Enseignant
          GROUP BY cours.Id_Cours";

$result = $conn->query($query);
?>

<div id="course-container">
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="course" data-course-id="<?php echo $row['Id_Cours']; ?>">
            <img src="path/to/image/<?php echo $row['Id_Cours']; ?>.jpg" alt="Course Image">
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
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
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
          <div class="col-lg-6">
            
          </div>
        </div>

        <div class="row justify-content-center text-center copyright">
          <div class="col-md-8">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
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
    document.querySelectorAll('.course').forEach(function(course) {
        course.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            window.location.href = 'course.php?course_id=' + courseId;
        });
    });
});
</script>



    
  </body>
  </html>
  
