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
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        
        #createCourseButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        #createCourseButton:hover {
            background-color: #45a049;
        }
        
