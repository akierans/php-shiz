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
			
		</style>

		<script type="text/javascript">
			
		</script>

		<title>This is a sample Table reading from MySQL</title>

	</head>

	<body>
		<div class ="c-main">
			<h1>PHP Read</h1>
			<p>This page displays a Table 'Contacts' pulled from MySQL db 'ak_test'</p>
		
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
				
			//Working down to here.


				$result = mysqli_query($con,"SELECT * FROM contact_details");

				echo "<table border='1'>
				<tr>
				<th>uid</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>DOB</th>
				<th>Email</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['uid'] . "</td>";
				echo "<td>" . $row['forename'] . "</td>";
				echo "<td>" . $row['surname'] . "</td>";
				//Original DOB
				echo "<td>" . $row['dob'] . "</td>";
				//Formatted DOB dd/mm/yyyy
				//echo "<td>" . date('d-m-Y', strtotime($row['dob'])) . "</td>"
				echo "<td>" . $row['email'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";

				//mysqli_close($link)
				?>

			</div>

		</div>

		
	</body>
</html>