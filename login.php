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
    <fieldset>
    <legend><strong>Admin login</strong></legend>
	<form action="validate.php" method="post">
				<input type="text" placeholder="Adminname"
						name="adminname" value="">
			</div>
				<input type="password" placeholder="Password"
						name="password" value="">
			</div>
			<input class="button" type="submit"
					name="login" value="Sign In">
		</div>
	</form>
    </fieldset>
</body>

<div class="fixed-footer">
      <?php 
          include_once("footer.inc");
      ?>
    </div>
</body>
</html>
