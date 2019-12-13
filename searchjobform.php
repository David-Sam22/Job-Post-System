<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author"   content="David Sam" />
    <title>Job Search</title>
  </head>
  <body>
    <h1>Job Vancancy Posting System</h1>
	<form action="searchjobprocess.php" method="get">
			<p><b>Job Title:</b> 
				<input type="text" name="search" />
				<p><b>Search By: </b>
				<select name="by">
					<option value="0"> ID </option>
					<option value="1" selected> Title </option>
					<option value="2"> Description </option>
					<option value="4"> Position </option>
					<option value="5"> Contract </option>
					<option value="6"> Application </option>
					<option value="7"> Location </option>
				</select>	
			</p>		
				<input type="submit" value="Search"/>	
			</p>
	</form>
	<p><a href="index.php"> Return to Home Page</a></p>
  </body>
</html>