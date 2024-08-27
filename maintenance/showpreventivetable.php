<!DOCTYPE html>
<html>
<head>
<style tyle="text/css">
h1 {
	text-align: center;
	}
table {
	text-align: center;
	vertical-align: middle;
	border: 2px solid black;
	border-collapse: collapse;
	margin: 20px auto;
	font-family: Verdana, Helvetica, serif;
	}
table tr:nth-child(even) {
	background-color: #ccc;
	}
table tr:first-child {
	border-bottom: 2px solid black;
	font-weight: bold;
	}
td {
	padding: 5px 15px 5px 15px;
	border: 1px solid black;
	}
</style>
</head>
<body>


<table>
<div id=header>
	<h1>Preventive Service Table</h1>
</div>
	<tr>
		<td>Preventive Id</td>
		<td>Preventive Service Description</td>
		<td>Preventive Service Price</td>
		<td>Preventive Service Contractor</td>
	</tr>



<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'maintenance');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
 

$data = mysqli_query(@$dbConnect, "SELECT * FROM tblpreventive") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['preventiveid'] . "</td>";
 echo "<td>".$info['preventivedesc'] . " </td>";
 echo "<td>".$info['preventiveprice']. " </td>";
 echo "<td>" .$info['preventivevendor']. " </td>";
 echo "</tr>";
 }
include'adminreview1.php';
?>
	


</table>
</body>
</html>