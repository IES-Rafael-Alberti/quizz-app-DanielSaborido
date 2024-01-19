<?php

require_once 'Quiz.php';
$shouldRetake = isset($_GET['retake']) && $_GET['retake'] === 'true';

if ($_SERVER["REQUEST_METHOD"] == "POST" || $shouldRetake) {
    $questions = array("q1", "q2", "q3", "q4", "q5", "q6", "q7", "q8", "q9", "q10");
    $missingAnswers = array();
    foreach ($questions as $question) {
        if (empty($_POST[$question])) {
            $missingAnswers[] = $question;
        }
    }

    if (!empty($missingAnswers)) {
        echo "<h2>Error: Debes responder todas las preguntas.</h2>";
        echo "<p>Preguntas sin respuesta: " . implode(", ", $missingAnswers) . "</p>";
    } else {
        $quiz = new Quiz();

        $quiz->addQuestion("What does PHP stand for?", "b");
        $quiz->addQuestion("What is the result of the following code snippet? \$x = 5; echo ++\$x + \$x++;", "c");
        $quiz->addQuestion("How do you declare a static method in a PHP class?", "a");
        $quiz->addQuestion("What is the purpose of the PHP function `htmlspecialchars()`?", "a");
        $quiz->addQuestion("How can you initiate a session in PHP?", "b");
        $quiz->addQuestion("What is the purpose of the `implode()` function in PHP?", "b");
        $quiz->addQuestion("In PHP, what is the difference between `==` and `===`?", "a");
        $quiz->addQuestion("How can you prevent SQL injection in PHP?", "c");
        $quiz->addQuestion("What is the purpose of the `unset()` function in PHP?", "b");
        $quiz->addQuestion("How can you include an external PHP file?", "c");

        $userAnswers = $_POST;
        $score = $quiz->calculateScore($userAnswers);
        $feedback = $quiz->generateFeedback();

        echo "<h2>Resultado del cuestionario:</h2>";
        echo "<p>Puntuación: $score / 10</p>";
        echo "<h3>Comentarios:</h3>";
        echo "<ul>";
        foreach ($feedback as $comment) {
            echo "<li>$comment</li>";
        }
        echo "</ul>";
    }

    echo '<form action="index.php" method="get">
            <input type="submit" value="Repetir cuestionario">
          </form>';
} else {
    header("Location: index.php");
    exit();
}