<?php
include("../config.php");

$state = $_POST["state"]; 
$hosp = $_POST["hosp"];
$btype = $_POST["btype"];

$sqry = "";
if($state != ""){
	$sqry .= " AND h.state = '$state'";
}
if($hosp != ""){
	$sqry .= " AND h.hospitalID = '$hosp'";
}
?>

<table class="table table-bordered table-striped bg-light">
<thead>
	<tr>
		<th>No.</th>
		<th>Hospital</th>
		<th>Address</th>
		<th>Email</th>
		<th>Phone No.</th>
		<th>Availability</th>
	</tr>
</thead>
<tbody>
	<?php
	$no = 1;
	$sql = "SELECT *, bs.$btype AS stockAvailable
	FROM bloodstock bs 
	JOIN hospital h ON h.hospitalID = bs.hospitalID
	WHERE 1=1 $sqry";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){ 
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $row["hospname"]; ?></td>
		<td><?php echo $row["address"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["phonenum"]; ?></td>
		<td><?php echo $row["stockAvailable"]; ?></td>
	</tr>
	<?php } ?>
</tbody>
</table>

