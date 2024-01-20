<?php
session_start();

$timerDuration = 5 * 60; 

if (!isset($_SESSION['quiz_start_time']) || isset($_GET['restart'])) {
    $_SESSION['quiz_start_time'] = time();
}

$elapsedTime = time() - $_SESSION['quiz_start_time'];
$remainingTime = max(0, $timerDuration - $elapsedTime);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['restart_timer'])) {
    $_SESSION['quiz_start_time'] = time();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        echo "<div class='timer'>" . gmdate("i:s", $remainingTime) . "</div>";
        echo "<form class='reset_timer' method='post' action='index.php'>
                <input type='hidden' name='restart_timer' value='1'>
                <input type='submit' value='Reset Time'>
              </form>"
    ?>
    <form method="post" action="process.php">
        <h1>PHP Quiz</h1>

        <!-- Question 1   R:b-->
        <div class="question">
            <p>1. What does PHP stand for?</p>
            <label><input type="radio" name="q1" value="a"> a) Personal Home Page</label>
            <label><input type="radio" name="q1" value="b"> b) PHP: Hypertext Preprocessor</label>
            <label><input type="radio" name="q1" value="c"> c) PHP Hyper Markup Language</label>
            <div id="result_q1"></div>
        </div>

        <!-- Question 2   R:c-->
        <div class="question">
            <p>2. What is the result of the following code snippet?</br><code>$x = 5;</br>echo ++$x + $x++;</code></p>
            <label><input type="radio" name="q2" value="a"> a) 11</label>
            <label><input type="radio" name="q2" value="b"> b) 12</label>
            <label><input type="radio" name="q2" value="c"> c) 13</label>
            <div id="result_q2"></div>
        </div>

        <!-- Question 3   R:a-->
        <div class="question">
            <p>3. How do you declare a static method in a PHP class?</p>
            <label><input type="radio" name="q3" value="a"> a) static function methodName() {}</label>
            <label><input type="radio" name="q3" value="b"> b) function static methodName() {}</label>
            <label><input type="radio" name="q3" value="c"> c) function methodName() static {}</label>
            <div id="result_q3"></div>
        </div>

        <!-- Question 4   R:a-->
        <div class="question">
            <p>4. What is the purpose of the PHP function `htmlspecialchars()`?</p>
            <label><input type="radio" name="q4" value="a"> a) Converts special characters to HTML entities</label>
            <label><input type="radio" name="q4" value="b"> b) Parses HTML code</label>
            <label><input type="radio" name="q4" value="c"> c) Encodes URLs</label>
            <div id="result_q4"></div>
        </div>

        <!-- Question 5   R:b-->
        <div class="question">
            <p>5. How can you initiate a session in PHP?</p>
            <label><input type="radio" name="q5" value="a"> a) start_session()</label>
            <label><input type="radio" name="q5" value="b"> b) session_start()</label>
            <label><input type="radio" name="q5" value="c"> c) init_session()</label>
            <div id="result_q5"></div>
        </div>

        <!-- Question 6   R:b-->
        <div class="question">
            <p>6. What is the purpose of the `implode()` function in PHP?</p>
            <label><input type="radio" name="q6" value="a"> a) Splits a string into an array</label>
            <label><input type="radio" name="q6" value="b"> b) Joins array elements into a string</label>
            <label><input type="radio" name="q6" value="c"> c) Finds the length of a string</label>
            <div id="result_q6"></div>
        </div>

        <!-- Question 7   R:a-->
        <div class="question">
            <p>7. In PHP, what is the difference between `==` and `===`?</p>
            <label><input type="radio" name="q7" value="a"> a) `==` checks for value equality, `===` checks for value and type equality</label>
            <label><input type="radio" name="q7" value="b"> b) `==` checks for value and type equality, `===` checks for value equality</label>
            <label><input type="radio" name="q7" value="c"> c) There is no difference</label>
            <div id="result_q7"></div>
        </div>

        <!-- Question 8   R:c-->
        <div class="question">
            <p>8. How can you prevent SQL injection in PHP?</p>
            <label><input type="radio" name="q8" value="a"> a) Use prepared statements</label>
            <label><input type="radio" name="q8" value="b"> b) Sanitize user input</label>
            <label><input type="radio" name="q8" value="c"> c) Both a and b</label>
            <div id="result_q8"></div>
        </div>

        <!-- Question 9   R:b-->
        <div class="question">
            <p>9. What is the purpose of the `unset()` function in PHP?</p>
            <label><input type="radio" name="q9" value="a"> a) Deletes a file</label>
            <label><input type="radio" name="q9" value="b"> b) Unsets a variable</label>
            <label><input type="radio" name="q9" value="c"> c) Removes an array element</label>
            <div id="result_q9"></div>
        </div>

        <!-- Question 10   R:c-->
        <div class="question">
            <p>10. How can you include an external PHP file?</p>
            <label><input type="radio" name="q10" value="a"> a) include("file.php")</label>
            <label><input type="radio" name="q10" value="b"> b) require("file.php")</label>
            <label><input type="radio" name="q10" value="c"> c) Both a and b</label>
            <div id="result_q10"></div>
        </div>

        <input type="submit" value="Submit">
        <a href="index.php?retake=true" class="reset" onclick="resetLocalStorage()">Reset Quiz</a>
    </form>
</body>
<script>
    window.onload = function () {
        var unansweredQuestionsFromStorage = window.localStorage.getItem('unansweredQuestions')
        if (unansweredQuestionsFromStorage) {
            var unansweredQuestions = JSON.parse(unansweredQuestionsFromStorage)
            for (var i = 0; i < unansweredQuestions.length; i++) {
                var questionKey = unansweredQuestions[i];
                var resultContainer = document.getElementById("result_" + questionKey)
                if (resultContainer) {
                    resultContainer.innerHTML = "You must answer this question."
                }
            }
        } else {
            var resultsFromStorage = window.localStorage.getItem('quizResults')
            if (resultsFromStorage) {
                var results = JSON.parse(resultsFromStorage);
                for (var questionKey in results) {
                    var resultContainer = document.getElementById("result_" + questionKey);
                    if (resultContainer) {
                        resultContainer.innerHTML = results[questionKey]
                    }
                }
            }
        }
    }
    function resetLocalStorage() {
        window.localStorage.clear();
    }
</script>
</html>
