
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author"   content="David Sam" />
    <title>Job Search</title>
  </head>
  <body>
    <?php
		if (isset($_GET["search"])) 
		{
			$search = $_GET["search"];
			$by = $_GET["by"];
			$filename = "../../data/jobposts/jobs.txt";
			$check = "";
			if (is_file($filename)) 
			{ 
				$itemdata = array(); 
				$handle = fopen($filename, "r");
				while (! feof ($handle)) 
				{ 
					$onedata = fgets($handle); 
					if ($onedata != "") 
					{ 
						 $data = explode("|",$onedata);

						 if($data[0] == "JobList" || $data[0] == "")
						 {

						 }else
						 {
							 if($search != "")
							{
								if(strpos(strtolower($data[GetSearchBy($by)]),strtolower($search)) !== false)
								{
									ShowResult($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]);
								}
							}else
							{
								echo "<b>You need to write something.</b>". "<br>";
								break;
							}								
						 }
						 $alldata [] = $data;
					}
				}
				ShowLinks();
				
			 fclose ($handle);
			} else 
			{
				echo "<b>Job Database failed to open.</b>". "<br>";
			}

		}
	?>
	<?php
	function GetSearchBy($var)
	{
		$result = "";
		switch($var)
		{
			case '0':
				$result = 0;
				break;
			case '1':
				$result = 1;
				break;
			case '2':
				$result = 2;
				break;
			case '4':
				$result = 4;
				break;
			case '5':
				$result = 5;
				break;		
			case '6':
				$result = 6;
				break;		
			case '7':
				$result = 7;
				break;						
		}
		return $result;
	}
	?>
	<?php
	function ShowLinks()
	{
		?>
		<p style="text-align:left;">
			<a href="searchjobform.php">Search for another job vacancy</a>
			<span style="float:right;">
				<a href="index.php">Return to Home Page</a>
			</span>
		</p>
		<?php
	}
	?>
	<?php
	function ShowResult($id,$title,$desc,$date,$pos,$con,$app,$loc)
	{
	?>
		<fieldset>
		<h3>Job Vancancy Information</h3>
		<p><b> Job ID:</b> <?php echo $id ?></p>
		<p><b> Job Title:</b> <?php echo $title ?></p>
		<p><b> Description:</b> <?php echo $desc ?></p>
		<p><b> Closing Date:</b> <?php echo $date ?></p>
		<p><b> Position: </b><?php echo $pos ?></p>	
		<p><b> Contract: </b> <?php echo $con ?></p>	
		<p><b> Application by: </b><?php echo $app ?></p>
		<p><b> Location: </b> <?php echo $loc ?></p>
		</fieldset>
	<?php	
	}
	?>
  </body>
</html>