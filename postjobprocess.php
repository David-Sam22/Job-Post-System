<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Web application development" />
		<meta name="keywords" content="PHP" />
		<meta name="author" content="David Sam" />
		<title>Post Job Process</title>
	</head>
	<body>
	
	<?php
	function CheckID()
	{
		$exist = false;
		$filename = "../../data/jobposts/jobs.txt";
		if(is_file($filename))
		{
			$handle = fopen($filename,"r");
			if($handle)
			{
				if( strpos(file_get_contents($filename),$_POST["ID"]) !== false) 
				{
					$exist = true;
				}
				fclose($handle);		
			}	
		}
		return $exist;
	}
	?>
	<?php
	function getForm()
	{
		$id = $_POST["ID"];
		$title = $_POST["title"];
		$desc = $_POST["desc"];
		$date = $_POST["date"];
		$position = $_POST["position"];
		$contract = $_POST["contract"];
		$app = " ";

		if(isset($_POST["post"]) && isset($_POST["mail"]))
		{
			$app = $_POST["post"]. ", ". $_POST["mail"];
		}else if(isset($_POST["post"]) && !isset($_POST["mail"]))
		{
			$app = $_POST["post"];
		}else if(isset($_POST["mail"]) && !isset($_POST["post"]))
			$app = $_POST["mail"];

		$location = $_POST["location"];
		
		$fields = array($id,$title,$desc,$date,$position,$contract,$app,$location);

		return $fields;
	}
	?>
	<?php
	function WriteToFile()
	{
	$filename = "../../data/jobposts/jobs.txt";
	
		if (is_file($filename)) 
		{
			$handle = fopen($filename,"a");
			$array = getForm(); 
			$data = "";
			foreach($array AS $field)
			{
				$data = $data. $field. "\t | \t";
				if($field === end($array))
				{
					$data = $data. "\n";
				}
			}
			if(fwrite ($handle, $data))
			{
				echo "Record is saved.". "<br>";
				echo "<br>". "Please <a href='index.php'>click here</a> to return to homepage.". "<br>";
			}else
			{
				echo "Record cannot be saved.". "<br>";
				echo "<br>". "Please <a href='postjobform.php'>click here</a> to go back and fill in the form again.". "<br>";
			}
			fclose($handle);
		}else
		{
			//$contents = "Position ID \t | \t Job Title \t | \t Job Description \t | \t Date \t | \t Position \t | \t Contract \t | \t Application \t | \t Location \n\n";     
			$contents = "";
			file_put_contents($filename, $contents); 
			WriteToFile();
		}
	}
	?>
	<?php 
	$fields = array('ID','title','desc','date','position','contract','post','mail','location');
	$error = false;
	foreach($fields AS $fieldname)
	{
		if(!isset($_POST[$fieldname])) // if not set
		{
			if(!($fieldname == "post" || $fieldname == "mail"))  //post or mail is optional
			{
				$error = true;
				if ($fieldname == "location" || $fieldname == "position" || $fieldname == "contract")
				{
					echo "'$fieldname'". " need to be selected.". "<br>";
				}else
					echo "'$fieldname'". " need to be filled.". "<br>";
			}
		}else // if set, get data to check
		{
			if($fieldname == "date")
			{
				$today =  date('Y-m-d');
				$inputDate = $_POST["date"];
				if($inputDate < $today)
				{
					echo "'date'". " must be greater than today.". "<br>";
					$error = true;
				}
			}else if ($fieldname == "ID")
			{
				if(CheckID()) //if exist
				{
					$ID = $_POST["ID"];
					echo "'$ID'". " already exist.". "<br>";
					$error = true;
				}
			}
		}
	}
	
	if(!$error)
	{	
		WriteToFile();
	}else
		echo "<br>". "Please <a href='postjobform.php'>click here</a> to return and fill in the form again.". "<br>";

	?>
	</body>
</html>