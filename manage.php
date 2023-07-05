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
<h2>Student Attempt Table</h2>
<?php
    if (!isset($_POST["studentID"]) && !isset($_POST["first_name"]) && !isset($_POST["last_name"])) {
            $query = "SELECT * FROM attempts";
    } else if (isset($_POST["first_name"])) {
            $first_name = trim($_POST["first_name"]);
            $query="SELECT * FROM attempts WHERE first_name LIKE '$first_name'";
    } else if (isset($_POST["last_name"])) {
            $last_name = trim($_POST["last_name"]);
            $query="SELECT * FROM attempts WHERE last_name LIKE '$last_name'";
    } else if (isset($_POST["studentID"])) {
        $student_number = trim($_POST["studentID"]);
        $query="SELECT * FROM attempts WHERE student_number LIKE '$student_number'";
    } 

    //Log in and use database
    $conn = @mysqli_connect();

    if ($conn) { 
        //check if the database is available for use
        $result = mysqli_query ($conn, $query);
        if ($result) {
        //check if query was successfully executed
            $record = mysqli_fetch_assoc($result);
            if ($record) {
                //check if any record exists
                echo "<table border='1'>";
                echo "<tr><th>attempt_id</th><th>date_time</th><th>first_name</th><th>last_name</th><th>student_number</th><th>attempt_number</th><th>score</th></tr>";
                while ($record) {
                echo "<tr><td>{$record['attempt_id']}</td>";
                echo "<td>{$record['date_time']}</td>";
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
<br><br>
<h2>Search Attempts</h2>
    <form action="manage.php" method="post">
        <p><label>Student ID: <input type="text" name="studentID"/></label></p>    
		<div class="manage_button"><input type="submit" value="Search"/></div>
    </form>
    <br>
    <form action="manage.php" method="post">
        <p><label>First name: <input type="text" name="first_name"/></label></p>    
		<div class="manage_button"><input type="submit" value="Search"/></div>
    </form>
    <br>
    <form action="manage.php" method="post">
        <p><label>Last name: <input type="text" name="last_name"/></label></p>    
		<div class="manage_button"><input type="submit" value="Search"/></div>
    </form>
    <br><br>
<h2>Student List</h2>
    <form action="list.php" method="post">
    <p>
        <label>Student who got: </label> 
        <br>
        <select name="student_list">
        <option value="">Please Select</option>		
        <option value="100">100% on their first attempt</option>			
        <option value="50">less than 50% on their second attempt</option>
        </select>
        <br><input type="submit" value="Search"/>
    </p>
    </form>
    <br><br>
<h2>Delete based on Student ID</h2>
    <form action="delete.php" method="post">
		<p><label>Student ID: <input type="text" name="studentID" required="required"/></label></p>      
		<div class="manage_button"><input type="submit" value="Delete"/></div>
	</form>
    <br><br>
<h2>Change score for student</h2>
    <form action="change.php" method="post">
        <p><label>Student ID: <input type="text" name="studentID" required="required"/></label></p>    
        <p><label>Attempt number: <input type="text" name="attempt_number" required="required"/></label></p>  
        <p><label>Change score to: <input type="text" name="change_score" required="required"/></label></p> 
        <div class="manage_button"><input type="submit" value="Update"/></div>
    </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="fixed-footer">
      <?php 
          include_once("footer.inc");
      ?>
</div>
</body>
</html>





