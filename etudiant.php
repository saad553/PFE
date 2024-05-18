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
    @import url(http://fonts.googleapis.com/css?family=Roboto:400,700,300);
  
  body {
    font-family: "Roboto", sans-serif;
    background:#212020;
  
  }

  .circle-wrap {
    display:flex;
    grid-template-columns: repeat(1, 160px);
    grid-gap: 80px;
    width: 150px;
    height: 150px;
    background: #d9d7da;
    border-radius: 50%;
    margin: 5%;
    
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
    background-color: #607CB1;;
  }
  
  .mask.full-1,
  .circle .fill-1 {
    animation: fill-1 ease-in-out 3s;
    transform: rotate(153deg);
    size: 20% ;
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
    background-color: #607CB1;;
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
        <a href="index.html"><img class="khdmi" src="logo.png" alt="image-alterna"></a>
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

        <div class="circle-wrap">
          <div class="circle">
            <div class="mask full-1">
              <div class="fill-1"></div>
            </div>
            <div class="mask half">
              <div class="fill-1"></div>
            </div>
            <div class="inside-circle"> 85% </div>
          </div>
        </div>
          <div class="circle-wrap">
            <div class="circle">
              <div class="mask full-2">
                <div class="fill-2"></div>
              </div>
              <div class="mask half">
                <div class="fill-2"></div>
              </div>
              <div class="inside-circle"> 65% </div>
            </div>
          </div>
          <div class="circle-wrap">
            <div class="circle">
              <div class="mask full-2">
                <div class="fill-2"></div>
              </div>
              <div class="mask half">
                <div class="fill-2"></div>
              </div>
              <div class="inside-circle"> 10% </div>
            </div>
          </div>
            <div class="circle-wrap">
              <div class="circle">
                <div class="mask full-3">
                  <div class="fill-3"></div>
                </div>
                <div class="mask half">
                  <div class="fill-3"></div>
                </div>
                <div class="inside-circle"> 75% </div>
              </div>
            </div>
            
   
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

    
  </body>
  </html>
