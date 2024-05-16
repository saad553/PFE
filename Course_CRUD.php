<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course CRUD</title>
    <style>
        /* Your existing CSS styles */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .header p {
            font-size: 1.2em;
            color: #555;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .course-card {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .course-card:hover {
            transform: scale(1.05);
        }

        .course-image img {
            width: 100%;
            height: auto;
        }

        .course-details {
            padding: 10px;
            background-color: #f0f0f0;
        }

        .course-title {
            margin-bottom: 5px;
            font-size: 1.2em;
            color: #333;
            font-weight: bold;
        }

        .course-instructor {
            margin-bottom: 5px;
            color: #555;
        }

        .course-parts {
            margin-bottom: 0;
            color: #007bff;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .course-card {
                width: 100%;
            }
        }
        .courses-container{
            display:flex;
            flex-direction: row;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Course CRUD</h1>
        <p>Ajouter, modifier et supprimer des Courses</p>
        <a href="#" class="button">Ajouter une course</a>
    </div>

    <div class="courses-container">
        <div class="course-card">
            <div class="course-image">
                <img src="images/js.png" alt="JavaScript Course">
            </div>
            <div class="course-details">
                <h3 class="course-title">JavaScript</h3>
                <p class="course-instructor">Mr. Moussi Mohammed</p>
                <p class="course-parts">Parts: 10</p>
                <a href="#" class="button">Mofidier</a>
                <a href="#" class="button">Supprimer</a>
            </div>
        </div>

        <div class="course-card">
            <div class="course-image">
                <img src="images/C.jpg" alt="Language C Course">
            </div>
            <div class="course-details">
                <h3 class="course-title">Language C</h3>
                <p class="course-instructor">Mr. Ait Moussa Abdelaziz</p>
                <p class="course-parts">Parts: 8</p>
                <a href="#" class="button">Edit</a>
                <a href="#" class="button">Delete</a>
            </div>
        </div>

        <div class="course-card">
            <div class="course-image">
                <img src="images/JAVA.jpg" alt="Java Course">
            </div>
            <div class="course-details">
                <h3 class="course-title">Java</h3>
                <p class="course-instructor">Mr. Mimouni Saad</p>
                <p class="course-parts">Parts: 12</p>
                <a href="#" class="button">Edit</a>
                <a href="#" class="button">Delete</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
