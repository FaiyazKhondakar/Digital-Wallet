<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Beneficiary</title>
	<style>
table, thead, tbody, tr, th, td {
border: 1px solid black;
}
</style>
</head>
<body>
	<h4>Digital Wallet</h4>
	<ol>
		<li><a href="Home.php">Home</li>
		<li><a href="Add_Beneficiary.php">Add Beneficiary</a></li>
		<li><a href="Transaction_History.php">Transaction History</a></li>
	</ol>

	<form action="Add_Beneficiary.php" method="POST">

		<h4>Add Beneficiary</h4>
		<label>Beneficiary Name:</label>
		<input type="text" name="Beneficiary_Name">
		<label>Mobile No:</label>
		<input type="tel" name="Mobile_No">
		<input type="submit" name="submit">
			
	</form>
	<br><br>


	<?php 

		if ($_SERVER["REQUEST_METHOD"]== "POST") {
			$Name = $_POST['Beneficiary_Name'];
			$Number = $_POST['Mobile_No'];
			if (!empty($Name)){
				if(!empty($Number)){
					echo "<table>";
					echo "<tr>";
					echo "<th>Beneficiary Name</th>";
					echo "<th>Mobile No</th>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>$Name</td>";
					echo "<td>$Number</td>";
					echo "</tr>";
					echo "</table>";
					echo "<br>";
				}
				

			
			}
			$handle=fopen("Data.json", a);
			$history =array('Name'=> $Name,'Number'=>$Number);
			$encode=json_encode($history);
			$wdata=fwrite($handle, $encode."\n");
		
			


		}
	?>
	
</body>
</html>