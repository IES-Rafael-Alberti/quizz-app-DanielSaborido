<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        echo "<h2>¡Formulario enviado con éxito!</h2>";
        echo "<p>Gracias por completar el cuestionario.</p>";
    }
} else {
    header("Location: index.php");
    exit();
}