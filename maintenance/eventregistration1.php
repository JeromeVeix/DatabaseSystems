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

<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'maintenance');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

// get data from the input boxes 
$userid = $_POST['userid'];
$phone = $_POST['phone'];
$date = $_POST['datee'];
$estimated_hours = $_POST['estimated_hours'];
$projecttype = $_POST['projecttype'];
$industrytype = $_POST['industrytype'];
$servicetype = $_POST['servicetype'];	
$preventivetype = $_POST['preventivetype'];   

if (!$userid || !$phone || !$date || !$estimated_hours || !$projecttype || !$industrytype || !$servicetype || !$preventivetype) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
//if (!get_magic_quotes_gpc()){
	//$userid = addslashes($userid);
	//$phone = addslashes($phone); 
	//$date = addslashes($date);
	//$estimated_hours = addslashes($guests);
	//$projecttype = addslashes($eventtype);
	//$industrytype = addslashes($venuetype);	
	//$servicetype = addslashes($foodtype);
	//$preventivetype = addslashes($decorationtype);
//}

// insert into contact database
$sqlString = "INSERT into tblprojecttype (datee, phone, estimated_hours, projecttype, industrytype, servicetype, preventivetype, userid, customerprice) 
		values	('$date', '$phone', '$estimated_hours', '$projecttype', '$industrytype','$servicetype', '$preventivetype', '$userid',' ')";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing

?>
<div id=header>
	<h1>Thank You for Registering</h1>
        <h1>If you see 0 for price, please log back in a while to get a price.</h1>
</div>
<table>
	<tr>
		<td>Event ID</td>
		<td>Date</td>
		<td>Phone</td>
		<td>Estimated Hours</td>
		<td>Project Type</td>
		<td>Industry Type</td>
		<td>Service Type</td>
		<td>Preventive Service Type</td>
		<td>User ID</td>
		<td>Price</td>
	</tr>
<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'maintenance');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblprojecttype where userid = '$userid'") 
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
 echo "<td>" .$info['servicetype']. " </td>";
 echo "<td>" .$info['preventivetype']. " </td>";
 echo "<td>" .$info['userid']. " </td>";
 echo "<td>" .$info['customerprice']. " </td>";
 echo "</tr>";
 } 

include'backtoregistration1.html';
?>

</body>
</html>