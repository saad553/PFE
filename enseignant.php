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
            font-family: "Montserrat", sans-serif;
            flex-direction: column;
            text-align: center;
            margin: 5%;
        }
        .CoursesContainer {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            gap: 50px;
        }

        .course-card:hover {
            transform: scale(1.1); /* Scale the div on hover */
        }

        .course-card {
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 18px;
            overflow: hidden;
            margin: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
                }

        .course-image img {
            width: 100%;
            height: auto;
            background-color: white;
        }

        .course-details {
            padding: 10px;
            background-color: #f0f0f0;
        }

        .course-title {
            margin-bottom: 5px;
            font-size: small;
            color: #333;
        }

        .course-instructor {
            margin-bottom: 5px;
            font-weight: bold;
            color: green;
        }

        .course-parts {
            margin-bottom: 0;
            color: blue;
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
    <title>Edufso</title>
</head>
<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">

<div class="container">
    <nav class="site-nav">
        <div class="logo">
            <a href="#"><img class="khdmi" src="logo.png" alt="image-alterna"></a>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="">Messages</a>
                    <a  href="logout.php">Logout</a>
                </li>
                    
                </ul>
            </div>
        </div>
    </nav> <!-- END nav -->

</div> <!-- END container -->

<div class="site-blocks-cover overlay" data-aos="fade" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 mt-lg-5 text-center">
                <h1 data-aos="fade-up" class="mb-4">Enseignant Dashboard</h1>
                <div class="row justify-content-around">
                    <div class="col-lg-8">
                        <?php echo' <p class="mb-5"  data-aos="fade-up" data-aos-delay="100">Bonjour  '.$_SESSION['user_name'].'<br><br><br>
                            Vous pouvez partager vos nouveaux cours, partager des nouveaux exercices et voir le rendement de vos cours.
                        </p>';
                        ?>
                       
                    </div> 
                
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <a href="#courses-section" class="btn btn-primary mr-2 mb-2">Explorer vos cours</a>
                    <a href="#enseignant-section" class="btn btn-primary mr-2 mb-2">Statistiques</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="TextCourses">
    <h1 id="courses-section" >Explorer vos Cours</h1>
    <div class="CoursesContainer">
        <div class="course-card">
            <div class="course-image">
                <img src="images/js.png" alt="Javascript Course">
            </div>
            <a href="Course.php">
            <div  class="course-details">
                <h3 class="course-title">Javascript</h3>
                <p class="course-instructor">Mr Moussi Mohammed</p>
                <p class="course-parts">Parties: 10</p>
            </div></a>
        </div>

        <div class="course-card">
            <div class="course-image">
                <img src="images/C.jpg" alt="Language C Course">
            </div>
            <div class="course-details">
                <h3 class="course-title">Language C</h3>
                <p class="course-instructor">Mr Ait Moussa Abdelaziz</p>
                <p class="course-parts">Parties: 8</p>
            </div>
        </div>

        <div class="course-card">
            <div class="course-image">
                <img src="images/JAVA.jpg" alt="Java Course">
            </div>
            <div class="course-details">
                <h3 class="course-title">Java</h3>
                <p class="course-instructor">Mr Mimouni Saad</p>
                <p class="course-parts">Parties: 12</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="statistics-section">
    <h2 id="enseignant-section">Statistiques</h2>
    <div class="bar-chart">
        <div class="bar" style="height: 60%;">60%</div>
        <div class="bar" style="height: 52%;">52%</div>
        <div class="bar" style="height: 15%;">15%</div>
        <div class="bar" style="height: 45%;">45%</div>
        <div class="bar" style="height: 80%;">80%</div>
        <div class="bar" style="height: 40%;">40%</div>
        <div class="bar" style="height: 20%;">20%</div>
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

</body>
</html>