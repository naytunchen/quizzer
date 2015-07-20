<?php include 'database.php'; ?>
<?php session_start(); ?> 
<?php 

    // Check to see if the score is set
    if(!isset($_SESSION['nay_score'])) {
        $_SESSION['nay_score'] = 0;
    }

    if($_POST) {
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;

        // Get total questions
        $query = "SELECT * FROM `questions`";

        // Get results
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;

        // Get correct answer for this question
        $query = "SELECT * FROM `choices` WHERE question_id=$number and is_correct=1";

        // Get result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

        // Get row
        $row = $result->fetch_assoc();

        // Set correct choice
        $correct_choice = $row['id'];

        // Compare
        if($correct_choice == $selected_choice) {
            // Answer is correct
            $_SESSION['nay_score']++;
        }

        // if current question is the last question, go to final.php 
        if($number == $total) {
            header("Location: final.php");
            exit();
        }
        else {
            header("Location: question.php?n=".$next);
        }
    }
