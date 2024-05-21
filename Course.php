<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Java Course - Lesson 1</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      line-height: 1.8;
      font-size: 1em;
      background: #fff;
      overflow-x: hidden;
    }
    h1, h2, h3, h4, h5 {
      color: #000839;
    }
    .text-primary {
      color: #3369e7 !important;
    }
    .btn-primary {
      background-color: #3369e7;
      border-color: #3369e7;
    }
    .btn-primary:hover {
      background-color: #4576e9;
      border-color: #4576e9;
    }
    .course-content {
      margin-top: 100px;
    }
    .course-title {
      margin-bottom: 30px;
    }
    .exercise-section {
      margin-top: 30px;
    }
    .comments-section {
      margin-top: 30px;
    }
    .sidebar {
      position: fixed;
      top: 0;
      right: 0;
      width: 300px;
      height: 100%;
      background-color: #f8f9fa;
      padding: 20px;
      overflow-y: auto;
      border-left: 1px solid #ddd;
    }
    .sidebar h2 {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 20px;
      margin-top: 50px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar ul li {
      margin-bottom: 10px;
    }
    .sidebar ul li a {
      color: #3369e7;
      text-decoration: none;
    }
    .sidebar ul li a:hover {
      text-decoration: underline;
    }
    .main-content {
      margin-right: 100px;
      margin-top: 200px;
    }
  </style>
</head>
<body>
<?php
include("db_connect.php");

if (!isset($_GET['course_id'])) {
    echo "Course ID not provided.";
    exit;
}

$course_id = intval($_GET['course_id']);

// Fetch course details
$course_query = "SELECT Titre_cours FROM cours WHERE Id_Cours = $course_id";
$course_result = $conn->query($course_query);
if ($course_result->num_rows > 0) {
    $course = $course_result->fetch_assoc();
} else {
    echo "Course not found.";
    exit;
}

// Fetch the first lesson for the course
$lesson_query = "SELECT * FROM lesson WHERE Id_Cours = $course_id ORDER BY Id_lesson ASC LIMIT 1";
$lesson_result = $conn->query($lesson_query);
if ($lesson_result->num_rows > 0) {
    $lesson = $lesson_result->fetch_assoc();
} else {
    echo "No lessons found for this course.";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="./images/logo.png" sizes="64x64">
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
    <title><?php echo $course['Titre_cours']; ?></title>
</head>
<body>
<div class="container">
    <nav class="site-nav" style="background-color: #1c394d;">
        <div class="logo">
            <a href="index.html"><img class="khdmi" src="./images/logo.png" alt="image-alterna"></a>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="index.html">Messages</a></li>
                    <li><a href="index.html">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content course-content">
        <h1 class="course-title"><?php echo $course['Titre_cours']; ?> - Lesson 1</h1>
        <?php echo nl2br($lesson['file_lesson']); ?>
        <button class="btn btn-primary">Next Lesson</button>
    </div>
    <aside class="sidebar">
        <h2 style="padding-top: 30% !important;">Upcoming Lessons</h2>
        <ul>
            <?php
            $upcoming_lessons_query = "SELECT Titre_lesson FROM lesson WHERE Id_Cours = $course_id AND Id_lesson > " . $lesson['Id_lesson'] . " ORDER BY Id_lesson ASC";
            $upcoming_lessons_result = $conn->query($upcoming_lessons_query);
            while ($upcoming_lesson = $upcoming_lessons_result->fetch_assoc()) {
                echo '<li><a href="#">' . $upcoming_lesson['Titre_lesson'] . '</a></li>';
            }
            ?>
        </ul>
    </aside>
</div>
    <section class="exercise-section">
      <h2>Exercises</h2>
      <form id="exercise-form">
        <div class="form-group">
          <label for="question1">Exercise 1: What is the output of the following Java code?</label>
          <pre><code>
public class Main {
  public static void main(String[] args) {
    System.out.println("Hello, World!");
  }
}
          </code></pre>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q1" id="q1a">
            <label class="form-check-label" for="q1a">A. Hello, World!</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q1" id="q1b">
            <label class="form-check-label" for="q1b">B. Hello World</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q1" id="q1c">
            <label class="form-check-label" for="q1c">C. Syntax Error</label>
          </div>
        </div>
        <div class="form-group">
          <label for="question2">Exercise 2: Which of the following is a correct variable declaration in Java?</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q2" id="q2a">
            <label class="form-check-label" for="q2a">A. int number = 5;</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q2" id="q2b">
            <label class="form-check-label" for="q2b">B. number int = 5;</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="q2" id="q2c">
            <label class="form-check-label" for="q2c">C. int = number 5;</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit Exercises</button>
      </form>
    </section>
    <section class="comments-section">
      <h2>Comments</h2>
      <form id="comments-form">
        <div class="form-group">
          <label for="comment">Leave a comment:</label>
          <textarea class="form-control" id="comment" rows="3" placeholder="Your comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
      </form>
      <div class="comment-list">
        <ul>
          <li>
            <div class="vcard"><img src="images/person_1.jpg" alt="Image placeholder"></div>
            <div class="comment-body">
              <h3>John Doe</h3>
              <div class="meta">May 15, 2024 at 2:21 pm</div>
              <p>Great lesson! Really enjoyed the exercises.</p>
            </div>
          </li>
          <li>
            <div class="vcard"><img src="images/person_2.jpg" alt="Image placeholder"></div>
            <div class="comment-body">
              <h3>Jane Smith</h3>
              <div class="meta">May 15, 2024 at 3:45 pm</div>
              <p>This was very helpful. Looking forward to the next lesson!</p>
            </div>
          </li>
          <li>
            <div class="vcard"><img src="images/person_3.jpg" alt="Image placeholder"></div>
            <div class="comment-body">
              <h3>Samuel Green</h3>
              <div class="meta">May 15, 2024 at 4:12 pm</div>
              <p>I found the explanation on data types particularly useful.</p>
            </div>
          </li>
        </ul>
      </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Handle exercise form submission
    $('#exercise-form').on('submit', function(event) {
      event.preventDefault();
      alert('Exercises submitted!');
    });
    // Handle comments form submission
    $('#comments-form').on('submit', function(event) {
      event.preventDefault();
      alert('Comment submitted!');
    });
  </script>
</body>
</html>