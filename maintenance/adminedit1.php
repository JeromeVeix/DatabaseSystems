<<!DOCTYPE html>
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
$eventid = $_POST['eventid'];
$industryid = $_POST['industryid'];
$serviceid = $_POST['serviceid'];	
$preventiveid = $_POST['preventiveid'];   

if (!$eventid || !$industryid || !$serviceid || !$preventiveid) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
//if (!get_magic_quotes_gpc()){	
	//$eventid = addslashes($eventid);
	//$venueid = addslashes($venueid);
	//$foodid = addslashes($foodid);
	//$decorationid = addslashes($decorationid);

//}
$estimated_hour = mysqli_query(@$dbConnect, "SELECT estimated_hours FROM tblprojecttype where eventid = '$eventid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $estimated_hour )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['estimated_hours'] . "</td>";
$estimated_hours = $info['estimated_hours'];
 echo "</tr>";
 }
$industry = mysqli_query(@$dbConnect, "SELECT industryprice FROM tblindustry where industryid = '$industryid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $industry )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['industryprice'] . "</td>";
$Iprice = $info['industryprice'];
 echo "</tr>";
 }
$service = mysqli_query(@$dbConnect, "SELECT serviceprice FROM tblservice where serviceid = '$serviceid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $service )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['serviceprice'] . "</td>";
$Sprice = $info['serviceprice'];
 echo "</tr>";
 }
$preventive = mysqli_query(@$dbConnect, "SELECT preventiveprice FROM tblpreventive where preventiveid = '$preventiveid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $preventive )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['preventiveprice'] . "</td>";
$Pprice = $info['preventiveprice'];
 echo "</tr>";
 }


$Aprice = $Iprice + ($Sprice * $estimated_hours) + $Pprice; 
echo "Sum: ",$Aprice; 
$Cprice = $Aprice + ($Aprice * .2);
echo "C: ", $Cprice;

// insert into contact database
$sqlString = mysqli_query(@$dbConnect,"UPDATE tblprojecttype SET industryid = '$industryid', serviceid = '$serviceid', preventiveid = '$preventiveid', customerprice = $Cprice, adminprice = $Aprice WHERE eventid = '$eventid'");

$dbConnect->close();
//** end of input processing

?>
<div id=header>
	<h1>Event Information</h1>
</div>
<table>
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
		<td>Preventive Service ID</td>
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
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblprojecttype where eventid = '$eventid'") 
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

include'backtoregistration1.html';
?>
</body>
</html>