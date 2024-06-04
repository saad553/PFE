<!DOCTYPE html>
<html>
<head>
    <title>Fetch Exercises</title>
</head>
<body>

<?php
if (isset($_POST['fetch_exercises'])) {
    // Execute the Python script
    $output = shell_exec('python3 /path/to/generate_exercises.py');
    echo "<pre>$output</pre>";

    // Connect to the database
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "projet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch exercises
    $sql = "SELECT e.Nom_Exercice, q.Question, o.Text, o.Is_Correct
            FROM exercice e
            JOIN question q ON e.Id_Exercice = q.Id_Exercice
            JOIN `option` o ON q.Id_Question = o.Id_Question";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Exercise: " . $row["Nom_Exercice"]. " - Question: " . $row["Question"]. " - Option: " . $row["Text"]. " - Correct: " . ($row["Is_Correct"] ? 'Yes' : 'No'). "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>

<form method="post">
    <button type="submit" name="fetch_exercises">Fetch Exercises</button>
</form>

</body>
</html>
