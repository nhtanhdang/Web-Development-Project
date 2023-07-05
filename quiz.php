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
<form name="myform" id="myform" method="post" action="markquiz.php">
<br>
<br>
<br>
<br>
<br>
<!-- header -->

<h1>
  Quiz
    <span class="pencil">✏️</span>
    <div><span id="timer"></span></div>

</h1>

 
  

  <fieldset>
    <legend><strong>Student details</strong></legend>
     <p>
        <label for="studentID">Student ID</label> 
        <input type="text" name= "studentID" id="studentID" required="required" pattern="\d{7,10}" />
      </p>
      <p>
        <label for="given_name">Given Name</label> 
        <input type="text" name= "given_name" id="given_name" required="required" pattern="[A-Za-z]{3,}"/>
        <br>
        <label for="family_name">Family Name</label> 
        <input type="text" name= "family_name" id="family_name" required="required" pattern="[A-Za-z]{3,}"/>
      </p>
  </fieldset>
  <fieldset>
    <legend><strong>Question 1</strong></legend>
      <p>
        Can We Share Streaming Media?
        <br>
        <input type="radio" id="question-1-answers-yes" name="question-1-answers" value="A" required="required"/>
        <label for="question-1-answers-A">A. Yes</label> 
        <br>
        <input type="radio" id="question-1-answers-no" name="question-1-answers" value="B"/>
        <label for="question-1-answers-B">B. No</label> 
        <br>
      </p>
      <br>
  </fieldset>
  <fieldset>
    <legend><strong>Question 2</strong></legend>
      <p>
        <label for="Question2">Who is the founder of the first popular streaming site? (Capitalise the first letter of each name and connect each person's name with a comma.</label>
        <br>
        <textarea id="Question2" name="question-2-answers" rows="4" cols="40" placeholder="Write your answer here" required="required"></textarea>
      </p>
  </fieldset>
  <fieldset>
   <legend>Question 3</legend>
      <p>
        What is streaming media?<br>
        <label for="AnswerA">Short Videos</label>
        <input type="checkbox" id="AnswerA" name="question-3-answers" value="A" checked="checked" required="required"/>
        <br>
        <label for="AnswerB">Online Video Content</label> 
        <input type="checkbox" id="AnswerB" name="question-3-answers" value="B"/>
        <br>
        <label for="AnswerC">Movies</label> 
        <input type="checkbox" id="AnswerC" name="question-3-answers" value="C"/>
        <br>
        <label for="AnswerD">TikTok</label> 
        <input type="checkbox" id="AnswerD" name="question-3-answers" value="D"/>
      </p>
  </fieldset>
  <fieldset>
    <legend>Question 4</legend>
      <p>
        <label for="fav_media">What is your favourite streaming media?</label> 
        <br>
        <select name="question-4-answers" id="fav_media" required="required">
        <option value="">Please Select</option>		
        <option value="A">TikTok</option>			
        <option value="B">Youtube</option>
        <option value="C">Twitch</option>
        <option value="D">Netflix</option>
        </select>
      </p>
  </fieldset>
  <fieldset>
    <legend>Question 5</legend>
		  <p>
		    What date was Yoube founded ?
		  <br>
      <label for="date">Date </label>
      <input type="text" id="date" name="question-5-answers" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required="required">
		  </p>
  </fieldset>
  <br>
  <br>
	<fieldset id="submit">	  
	<input type= "submit" value="Submit"/>
	<input type= "reset" value="Reset Form"/>
	</fieldset>	 
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
<script src="js/timer.js"> </script>
</body>
</html>
