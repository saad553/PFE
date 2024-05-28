<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=projet';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get exercise ID from query parameter
    $exerciseId = $_GET['exercise_id'];

    // Fetch exercise data
    $stmt = $pdo->prepare('SELECT * FROM exercice WHERE Id_Exercice = ?');
    $stmt->execute([$exerciseId]);
    $exercise = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch questions and options
    $stmt = $pdo->prepare('SELECT * FROM question WHERE Id_Exercice = ?');
    $stmt->execute([$exerciseId]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $options = [];
    foreach ($questions as $question) {
        $stmt = $pdo->prepare('SELECT * FROM option WHERE Id_Question = ?');
        $stmt->execute([$question['Id_Question']]);
        $options[$question['Id_Question']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($exercise['Nom_Exercice']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($exercise['Nom_Exercice']); ?></h1>
    <form action="submit_answers.php" method="post">
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <h2><?php echo htmlspecialchars($question['text']); ?></h2>
                <?php foreach ($options[$question['Id_Question']] as $option): ?>
                    <input type="radio" name="q<?php echo $question['Id_Question']; ?>" value="<?php echo $option['Id_Option']; ?>">
                    <?php echo htmlspecialchars($option['Text']); ?><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
