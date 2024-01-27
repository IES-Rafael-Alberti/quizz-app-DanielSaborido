SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `quiz` ;
USE `quiz` ;

CREATE TABLE IF NOT EXISTS `quiz`.`QUIZ` (
  `quiz_id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`quiz_id`),
  UNIQUE INDEX `quiz_id_UNIQUE` (`quiz_id` ASC) VISIBLE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `quiz`.`QUESTION` (
  `question_id` INT NOT NULL AUTO_INCREMENT,
  `QUIZ_quiz_id` INT NOT NULL,
  `question_text` VARCHAR(255) NOT NULL,
  `option_a` VARCHAR(255) NOT NULL,
  `option_b` VARCHAR(255) NOT NULL,
  `option_c` VARCHAR(255) NOT NULL,
  `correct_option` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`question_id`),
  INDEX `fk_QUESTION_QUIZ_idx` (`QUIZ_quiz_id` ASC) VISIBLE,
  CONSTRAINT `fk_QUESTION_QUIZ`
    FOREIGN KEY (`QUIZ_quiz_id`)
    REFERENCES `quiz`.`QUIZ` (`quiz_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `quiz`.`QUIZ` (`title`, `description`) VALUES
    ('PHP Quiz', 'Test your knowledge on PHP concepts.');

INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'What does PHP stand for?', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'PHP Hyper Markup Language', 'b');

INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'What is the result of the following code? $x = 5; echo ++$x + $x++;', '11', '12', '13', 'c');

INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'How do you declare a static method in a PHP class?', 'static function methodName() {}', 'function static methodName() {}', 'function methodName() static {}', 'a');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'What is the purpose of the PHP function `htmlspecialchars()`?', 'Converts special characters to HTML entities', 'Parses HTML code', 'Encodes URLs', 'a');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'How can you initiate a session in PHP?', 'start_session()', 'session_start()', 'init_session()', 'b');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'What is the purpose of the `implode()` function in PHP?', 'Splits a string into an array', 'Joins array elements into a string', 'Finds the length of a string', 'b');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'In PHP, what is the difference between `==` and `===`?', '`==` checks for value equality, `===` checks for value and type equality', '`==` checks for value and type equality, `===` checks for value equality', 'There is no difference', 'a');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'How can you prevent SQL injection in PHP?', 'Use prepared statements', 'Sanitize user input', 'Both a and b', 'c');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'What is the purpose of the `unset()` function in PHP?', 'Deletes a file', 'Unsets a variable', 'Removes an array element', 'b');
    
INSERT INTO `quiz`.`QUESTION` (`QUIZ_quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
    (1, 'How can you include an external PHP file?', 'include("file.php")', 'require("file.php")', 'Both a and b', 'c');
