<?php include_once("header.inc");?>
    <title>Index</title>
    <link rel="stylesheet" href="styles/quizstyles.css">
    <link rel="stylesheet" href="styles/mobilestyles.css">
  </head>
  <body>
    <!-- navigation bar -->
    <div class="fixed-header">
    <?php include_once("menu.inc");?>
    </div>
    <br>
<br>
<br>
<br>
<br>
<?php
    //Function to sanitize input
    function sanitize_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function cal_percentage($num_amount, $num_total) {
        $count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        return $count;
      }      
?>
<?php
    //Create connection to the database from php
    //require_once ("quiz.php");
    $conn = mysqli_connect(
    );

    //Check if connection is successful
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    } else 
    {
        //Upon successful connection
        $datetime = date('d-m-y h:i:s');
        if (isset ($_POST["given_name"])) {
            $first_name = $_POST["given_name"];
        }
        else {
            header ("location: quiz.php");
        }
        if (isset ($_POST["family_name"])) $last_name = $_POST["family_name"];
        if (isset ($_POST["studentID"])) $student_number = $_POST["studentID"];

        $first_name = sanitize_input($first_name);
        $last_name = sanitize_input($last_name);
        $student_number = sanitize_input($student_number);

        $sql_table = "attempts";
        
        $querycheck = "CREATE TABLE IF NOT EXISTS attempts (
                    attempt_id int(11) AUTO_INCREMENT NOT NULL,
                    date_time datetime NOT NULL,
                    first_name varchar(30) NOT NULL,
                    last_name varchar(30) NOT NULL,
                    student_number int(11) NOT NULL,
                    attempt_number int(11) NOT NULL,
                    score int(11) NOT NULL,
                    PRIMARY KEY(attempt_id))";
        $resultcheck = mysqli_query($conn, $querycheck);
        
        if (!$resultcheck) {
            echo "Failed to connect to MySQL: " . $querycheck -> connect_error;
            exit();
        }
        //Query to see if a student ID has already existed
        $query = "SELECT * FROM $sql_table WHERE student_number = '$student_number'";
        
        // If the table doesn't exist
        
        $results = mysqli_query($conn, $query);
        if($results) {
            $record = mysqli_num_rows($results);
            if($record < 2) {
                if($record < 1) {
                    $attempt = 1;
                    echo "<p>You can try it again <a id='quiz_attempt' href='quiz.php'>quiz</a><br>";
                }
                else if($record = 1) {
                    $attempt = 2;
                }
                $answer1 = $_POST['question-1-answers'];
                $answer2 = $_POST['question-2-answers'];
                $answer3 = $_POST['question-3-answers'];
                $answer4 = $_POST['question-4-answers'];
                $answer5 = $_POST['question-5-answers'];
    
                $totalCorrect = 0;
                if ($answer1 == "A") { $totalCorrect++; }
                if ($answer2 == "Steven Chen, Chad Hurley, Jawed Karim") { $totalCorrect++; }
                if ($answer3 == "A" && $answer3 == "B") { $totalCorrect++; }
                if ($answer4 == "A") { $totalCorrect++; }
                if ($answer5 == "14/02/2005") { $totalCorrect++; }

                $score = cal_percentage($totalCorrect, 5);

                //Insert new record
                $query = "INSERT INTO $sql_table (attempt_id, date_time, first_name, last_name, student_number, attempt_number, score) VALUES ('NULL', '$datetime', '$first_name', '$last_name', '$student_number', '$attempt', '$score%')";
                $result = mysqli_query($conn, $query);  
                echo "<p>Student name: $first_name $last_name. <br>
                Student ID: $student_number. <br>
                Number of attempt: $attempt. <br>
                You got $score%<br><p>";
            }
            else {
                echo "<p>You have reached 2 attempts!<p>";
            }
                
        }
        else {
            echo "<p>MySQL operation 2 unsuccessful.</p>";
        }
    mysqli_close($conn);
    }
?>
<div class="fixed-footer">
      <?php 
          include_once("footer.inc");
      ?>
</div> 

</body>
</html>