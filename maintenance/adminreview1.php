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
	<h1>Customers</h1>
</div>
	<tr>
		<td>User Id</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Type</td>
	</tr>



<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'maintenance');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}


$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser order by userId desc") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "</tr>";
 } 
?>
	

<table>
<div id=header>
	<h1>Project Information</h1>
</div>
	
	<tr>
		<td>Project ID</td>
		<td>Date</td>
		<td>Phone</td>
		<td>Estimated Hours</td>
		<td>Project Type</td>
		<td>Industry Type</td>
		<td>Industry ID</td>
		<td>Service Type</td>
		<td>Service ID</td>
		<td>Preventive Service Type</td>
		<td>Preventive ID</td>
		<td>User ID</td>
		<td>Customer Price</td>
		<td>Admin Price</td>
	</tr>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'maintenance');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblprojecttype") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['eventid'] . "</td>";
 echo "<td>".$info['datee'] . " </td>";
 echo "<td>".$info['phone']. " </td>";
 echo "<td>" .$info['estimated_hours']. " </td>";
 echo "<td>" .$info['projecttype']. " </td>";
 echo "<td>" .$info['industrytype']. " </td>";
 echo "<td>" .$info['industryid']. " </td>";
 echo "<td>" .$info['servicetype']. " </td>";
 echo "<td>" .$info['serviceid']. " </td>";
 echo "<td>" .$info['preventivetype']. " </td>";
 echo "<td>" .$info['preventiveid']. " </td>";
 echo "<td>" .$info['userid']. " </td>";
 echo "<td>" .$info['customerprice']. " </td>";
 echo "<td>" .$info['adminprice']. " </td>";
 echo "</tr>";
 }
include'adminreview1.html';
include'deleteevent1.html';
include'deleteuser1.html';
include'backtoregistration1.html';
?>




</table>
</body>
</html>