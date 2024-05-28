<?php
// Replace with your OpenAI API key
$apiKey = 'sk-proj-ULs4VqcA0sH0XjLeP5tIT3BlbkFJ5NxLhTkoBi47YoypNOtE';

// Database connection
$dsn = 'mysql:host=localhost;dbname=projet';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch lessons
    $stmt = $pdo->query('SELECT Id_lesson, Titre_lesson FROM lesson');
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($lessons as $lesson) {
        $lessonId = $lesson['Id_lesson'];
        $lessonTitle = $lesson['Titre_lesson'];

        // Generate exercise using OpenAI API
        $prompt = "Generate a set of 5 questions with 3 options each for the topic '$lessonTitle'. Indicate the correct option for each question.";
        $response = generateExercise($prompt, $apiKey);

        if (isset($response['choices']) && !empty($response['choices'])) {
            $exerciseContent = $response['choices'][0]['text'];

            // Store exercise in the database
            $stmt = $pdo->prepare('INSERT INTO exercice (Nom_Exercice, Id_lesson) VALUES (?, ?)');
            $stmt->execute([$lessonTitle, $lessonId]);
            $exerciseId = $pdo->lastInsertId();

            // Parse and store questions and options
            $questions = explode("\n\n", $exerciseContent);
            foreach ($questions as $question) {
                if (trim($question)) {
                    list($questionText, $option1, $option2, $option3) = explode("\n", $question);
                    $stmt = $pdo->prepare('INSERT INTO question (text, Id_Exercice) VALUES (?, ?)');
                    $stmt->execute([trim($questionText), $exerciseId]);
                    $questionId = $pdo->lastInsertId();

                    $options = [$option1, $option2, $option3];
                    foreach ($options as $option) {
                        $isCorrect = stripos($option, 'correct') !== false;
                        $stmt = $pdo->prepare('INSERT INTO option (Text, Is_Correct, Id_Question) VALUES (?, ?, ?)');
                        $stmt->execute([trim($option), $isCorrect, $questionId]);
                    }
                }
            }
        } else {
            echo "Error: Unable to generate exercise for lesson '$lessonTitle'. Response: " . json_encode($response) . "<br>";
        }
    }

    echo "Exercises generated and stored successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function generateExercise($prompt, $apiKey) {
    $url = 'https://api.openai.com/v1/completions';

    $data = [
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
        'max_tokens' => 1000,
    ];

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);

    if ($response === false) {
        return ['error' => curl_error($ch)];
    }

    curl_close($ch);
    return json_decode($response, true);
}
?>
