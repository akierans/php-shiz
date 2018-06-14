<html>
	<head>
		<style type="text/css">
		body {
			font-family: verdana, arial;
		}

		.c-main {
			background-color: lightblue;
			width: 85%;
			height: 100%;
			margin:auto;
		}

		.c-form {
			background-color: lightgreen;
			border-radius: 25px;
			width: 200px;
			padding: 25px;
			margin: auto;
			clear: both;
		}

		.c-form input {
  			width: 100%;
  			clear: both;
		}
			
		</style>

		<script type="text/javascript">
			
		</script>

		<title>This is a sample Table reading from MySQL</title>

	</head>

	<body>
		<div class ="c-main">
			<h1>PHP Write</h1>
			<p>This page displays a Form for adding contacts 'Contacts' to MySQL db 'ak_test'</p>
		
			<div>

				<?php
					//DB Vars
					$dbhost    = "localhost";
					$dbuser    = "web-connect";
					$dbpass    = "web-test";
					$dbname = "ak_test";
					$dbport = "3306";

					// Prints Current PHP version
					echo 'Current PHP version: ' . phpversion();
				?>

				<?php
					//Create connection
					$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
					
					// Check connection
					if (mysqli_connect_errno()) {
						die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
					}
				
					echo "</br></br>Successfully connected to <i>" . $dbname . "</i> at " . $dbhost;
				
			
			?>
			<!--Working down to here-->

			<br/>
			<h2>Contact Details Data Submission Form</h2>

			<form class="c-form" action="" method="post">
			<label>Forename :</label>
			<input type="text" name="frm_forename" id="forename" required="required" placeholder="John"/>
			<br /><br />
			<label>Surname :</label>
			<input type="text" name="frm_surname" id="surname" required="required" placeholder="Smith"/>
			<br /><br />
			<label>Date of Birth :</label>
			<input type="text" name="frm_dob" id="dob" required="required" placeholder="01/04/1990"/>
			<br/><br />
			<label>Student Email :</label>
			<input type="email" name="frm_email" id="email" required="required" placeholder="john123@gmail.com"/
			><br/><br />
			
			<input type="submit" value=" Submit " name="submit"/><br />
			</form>
				



				<?php
				if(isset($_POST["submit"])){
					echo "Submitting";
					$sql = "INSERT INTO contact_details (forename, surname, dob, email)
				VALUES ('".$_POST["frm_forename"]."','".$_POST["frm_surname"]."','".$_POST["frm_dob"]."','".$_POST["frm_email"]."')";
				}

				if ($con->query($sql) === TRUE) {
				echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
				} else {
				echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $con->error."');</script>";
				}
				

				/*

				*/

				//mysqli_close($link)
				?>

			</div>

		</div>

		
	</body>
</html>