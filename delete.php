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
<?php
	if (isset ($_POST["studentID"])) {
        $studentID = trim($_POST["studentID"]);
    } else {
		header ("location:manage.php");
		exit();
	}

	$conn = @mysqli_connect("feenix-mariadb.swin.edu.au",
    "s103502059",
    "eloisenhat",
    "s103502059_db"
    );

	if ($conn) { // check is database is available for use
		$query = "DELETE FROM attempts WHERE student_number = '$studentID'";
		 
		$result = mysqli_query ($conn, $query);
		if ($result) {								// check if query was successfully executed
			echo "<p>" . mysqli_affected_rows($conn) . " record deleted. </p>";
		} else {
			echo "<p>Delete operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
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