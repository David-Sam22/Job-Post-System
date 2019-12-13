<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Job Vancancy Posting System" />
    <meta name="keywords" content="Assignment" />
    <meta name="author"   content="David Sam" />
    <title>Job Vancancy Posting System</title>
  </head>
  <body>
    <h1>Job Vancancy Posting System</h1>
	<form action="postjobprocess.php" method="POST">
		<fieldset>
		<legend><strong> Fill in the form </strong></legend>
			<p><b>Position ID: </b> <input required type="text" name="ID" maxlength="5" pattern="([P]{1})+[0-9]{4}"/></p>
			<p><b>Title:</b> <input required type="text" name="title" maxlength="20" pattern="^[A-Za-z0-9\!\,\.]"/></p>  
			<p><b>Description:</b> <textarea required name="desc" maxlength="260"></textarea></p>
			<p><b>Closing Date:</b> <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"></p>
			<p><b>Position:</b> 
				<input type="radio" name="position" value="Full Time"> Full-time
				<input type="radio" name="position" value="Part Time"> Part-time
			</p>
			<p><b>Contract: </b>
				<input type="radio" name="contract" value="Ongoing"> On-going
				<input type="radio" name="contract" value="Fixed Term"> Fixed Term
			</p>
			<p><b>Application by: </b> 
				<input type="checkbox" name="post" value="Post"> Post
				<input type="checkbox" name="mail" value="Mail"> Mail
			</p>
			<p><b>Location: </b>
				<select name="location">
					<option disabled selected value> --- </option>
					<option value="ACT"> ACT </option>
					<option value="NSW"> NSW </option>
					<option value="NT"> NT </option>
					<option value="QLD"> QLD </option>
					<option value="SA"> SA </option>
					<option value="TAS"> TAS </option>
					<option value="VIC"> VIC </option>
					<option value="WA"> WA </option>
				</select>	
			</p>				
			
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset">
		</fieldset>	
		

	</form>
		<p>All fields are required.<a href="index.php"> Return to Home Page</a></p>
  </body>
</html>