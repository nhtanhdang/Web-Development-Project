<?php include_once("header.inc");?>
    <title>Retrieving records and marking</title>
    <link rel="stylesheet" href="styles/quizstyles.css">
    <link rel="stylesheet" href="styles/mobilestyles.css" />  
</head>
<body>
<div class="fixed-header">
    <?php include_once("menu.inc");?>
    </div>
    <br>
<br>
<br>
<br>
<br>
<h2>Student List</h2>
<?php
    if (!isset($_POST["student_list"])) {
            $query = "SELECT * FROM attempts";
    } else {
        $student_list = trim($_POST["student_list"]);
        if ($student_list == '100') {
            $query="SELECT * FROM attempts WHERE score LIKE '$student_list' AND attempt_number LIKE '1'";
        } else {
            $query="SELECT * FROM attempts WHERE score <= '$student_list' AND attempt_number LIKE '2'";
        }
    }


    //Log in and use database
    $conn = @mysqli_connect("feenix-mariadb.swin.edu.au",
    "s103502059",
    "eloisenhat",
    "s103502059_db"
    );

    if ($conn) { //check if the database is available for use
        $result = mysqli_query ($conn, $query);
        if ($result) {
//check if query was successfully executed
            $record = mysqli_fetch_assoc($result);
            if ($record) {
//check if any record exists
                echo "<table border='1'>";
                echo "<tr><th>first_name</th><th>last_name</th><th>student_number</th><th>attempt_number</th><th>score</th></tr>";
                while ($record) {
                echo "<td>{$record['first_name']}</td>";
                echo "<td>{$record['last_name']}</td>";
                echo "<td>{$record['student_number']}</td>";
                echo "<td>{$record['attempt_number']}</td>";
                echo "<td>{$record['score']}</td></tr>";
                $record = mysqli_fetch_assoc($result);
                }       
                echo "</table>";
                //Free up resources
                mysqli_free_result ($result); 
            } else {
                echo "<p>No records retrieved.</p>";
            }
        } else {
            echo "<p>Attempts table doesn't exist or select operation unsuccessful.</p>";
        }
        //Close the database connect
        mysqli_close($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
?>
<div class="fixed-footer">
      <?php 
          include_once("footer.inc");
      ?>
</div>
</body>
</html>
