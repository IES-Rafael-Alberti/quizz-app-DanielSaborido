<?php
    $servername = "db";
    $username = "esclava";
    $password = "pestillo";
    
    $conn = new mysqli($servername, $username, $password, "quiz");  

    if (
        isset($_POST['question_text']) || 
        isset($_POST['option_a']) || 
        isset($_POST['option_b']) || 
        isset($_POST['option_c']) || 
        isset($_POST['correct_option'])) 
        {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question_text'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $correct_option = $_POST['correct_option'];
            $sql = "INSERT INTO QUESTION (question_text, option_a, option_b, option_c, correct_option, QUIZ_quiz_id) VALUES ('$question', '$option_a', '$option_b', '$option_c', '$correct_option', 1)";
            $conn->query($sql);
            echo "Question added successfully";
        }   
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a>
    <form action="add_questions.php" method="post">
        <label for="question">Question</label>
        <input type="text" name="question_text" id="question_text">
        <br>
        <label for="option_a">Option A</label>
        <input type="text" name="option_a" id="option_a">
        <br>
        <label for="option_b">Option B</label>
        <input type="text" name="option_b" id="option_b">
        <br>
        <label for="option_c">Option C</label>
        <input type="text" name="option_c" id="option_c">
        <br>
        <label for="correct_option">Correct Option</label>
        <input type="text" name="correct_option" id="correct_option">
        <br> 
        <input type="submit" value="Submit">
    </form>
</body>
</html>