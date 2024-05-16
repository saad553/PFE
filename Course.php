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
  <div class="container">
    <nav class="site-nav" style="background-color: #1c394d;">
      <div class="logo">
        <a href="index.html"><img class="khdmi" src="logo.png" alt="image-alterna"></a>
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
      <h1 class="course-title">Java Programming - Lesson 1</h1>
      <p>Welcome to the first lesson of Java programming. In this lesson, you will learn about the basics of Java, including syntax, data types, and basic operations. Java is a versatile and powerful programming language used for a variety of applications.</p>
      <p>Java was developed by James Gosling at Sun Microsystems and released in 1995. It is an object-oriented language that is platform-independent, which means that Java programs can run on any device that has a Java Virtual Machine (JVM).</p>
      <h2>1. Introduction to Java</h2>
      <p>Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is intended to let application developers write once, run anywhere (WORA), meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.</p>
      <p>The syntax of Java is largely influenced by C and C++, but it has fewer low-level facilities than either of them. The language's design provides a broad range of features for networking, database access, graphical user interfaces (GUIs), and more.</p>
      <h2>2. Basic Syntax</h2>
      <p>Java syntax is the set of rules defining how a Java program is written and interpreted. The basic syntax includes the following components:</p>
      <ul>
        <li><strong>Classes and Objects:</strong> A class is a blueprint for objects. It defines a datatype by bundling data and methods that work on the data into one single unit.</li>
        <li><strong>Methods:</strong> A method is a collection of statements that perform some specific task and return the result to the caller. A method can perform some specific task without returning anything.</li>
        <li><strong>Variables:</strong> Variables are containers for storing data values.</li>
        <li><strong>Data Types:</strong> Java is a strongly typed language. Every variable must be declared with a data type.</li>
      </ul>
      <p>Let's start with a simple "Hello, World!" program in Java:</p>
      <pre><code>
public class Main {
  public static void main(String[] args) {
    System.out.println("Hello, World!");
  }
}
      </code></pre>
      <p>This program consists of a class named Main that contains a single method named main. The main method is the entry point of any Java program. The System.out.println method is used to print text to the console.</p>
      <h2>3. Data Types</h2>
      <p>Java has a rich set of built-in data types. These data types are classified into two categories:</p>
      <ul>
        <li><strong>Primitive Data Types:</strong> These include byte, short, int, long, float, double, boolean, and char.</li>
        <li><strong>Non-Primitive Data Types:</strong> These include classes, interfaces, and arrays.</li>
      </ul>
      <h2>4. Basic Operations</h2>
      <p>Java provides a wide range of operators to perform operations on variables and values. These operators can be classified as follows:</p>
      <ul>
        <li><strong>Arithmetic Operators:</strong> These are used to perform basic arithmetic operations like addition, subtraction, multiplication, division, and modulus.</li>
        <li><strong>Relational Operators:</strong> These are used to compare two values and determine the relationship between them.</li>
        <li><strong>Logical Operators:</strong> These are used to combine multiple boolean expressions or conditions.</li>
        <li><strong>Assignment Operators:</strong> These are used to assign values to variables.</li>
      </ul>
      <button class="btn btn-primary">Next Lesson</button>
    </div>
    <aside class="sidebar">
      <h2>Upcoming Lessons</h2>
      <ul>
        <li><a href="#">Lesson 2: Variables and Data Types</a></li>
        <li><a href="#">Lesson 3: Control Flow Statements</a></li>
        <li><a href="#">Lesson 4: Methods</a></li>
        <li><a href="#">Lesson 5: Object-Oriented Programming</a></li>
        <li><a href="#">Lesson 6: Exception Handling</a></li>
        <li><a href="#">Lesson 7: Arrays</a></li>
        <li><a href="#">Lesson 8: Collections Framework</a></li>
        <li><a href="#">Lesson 9: Java I/O</a></li>
        <li><a href="#">Lesson 10: Multithreading</a></li>
      </ul>
    </aside>
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
