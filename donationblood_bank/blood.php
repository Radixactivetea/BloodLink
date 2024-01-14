<?php
	include("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BloodLink</title>
	<!-- css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/nav_footer.css">
	<link rel="stylesheet" href="../home folder/css/home.css">
	<!-- javascript -->
	<script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- menu bar -->
	<?php include('../user_nav.php') ?>
	
	<!-- section 1 -->
	<section id="search-blood">
		<h1>Blood Stock Availabilities</h1>

		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Search Blood Stock</h5>
					</div>
					<div class="card-body">
						<form>
						<div class="row">
							<div class="col">
								<select class="form-select" id="state" name="state">
									<option value="" selected>Select State</option>
									<?php
									$sqls = "SELECT DISTINCT `state` FROM hospital";
									$results = mysqli_query($conn, $sqls);
									while($rows = mysqli_fetch_assoc($results)){ 
									?>
									<option value="<?php echo $rows["state"]; ?>"><?php echo $rows["state"]; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col">
								<select class="form-select" id="hosp" name="hosp">
									<option value="" selected>Select Hospital</option>
									<?php
									$sqlh = "SELECT hospitalID, hospname FROM hospital";
									$resulth = mysqli_query($conn, $sqlh);
									while($rowh = mysqli_fetch_assoc($resulth)){ 
									?>
									<option value="<?php echo $rowh["hospitalID"]; ?>"><?php echo $rowh["hospname"]; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col">
								<select class="form-select" id="btype" name="btype">
									<option value="A_POSITIVE" selected="">A+</option>
									<option value="B_POSITIVE">B+</option>
									<option value="AB_POSITIVE">AB+</option>
									<option value="O_POSITIVE">O+</option>
									<option value="A_NEGATIVE">A-</option>
									<option value="B_NEGATIVE">B-</option>
									<option value="AB_NEGATIVE">AB-</option>
									<option value="O_NEGATIVE">O-</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 text-center mt-3">
							<button type="button" class="btn btn-success" onclick="bloodSearch()">Search</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div id="result" class="col-md-12">
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
						<tr>
							<td colspan="6" align="center">Please search to view data</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	
	</section>
	
	<!-- footer -->
	<?php include('../footer.php') ?>


	<script type="text/javascript">
		function bloodSearch(){

			var state = $("#state").val();
			var hosp = $("#hosp").val();
			var btype = $("#btype").val();

			var request = $.ajax({
			  	url: "blood_search.php",
			  	type: "POST",
			  	data: {state : state, hosp:hosp, btype:btype},
			});

			request.done(function(data) {
			  	$("#result").html(data);
			});

			request.fail(function(jqXHR, textStatus) {
			  	alert( "Request failed: " + textStatus );
			});
		}
	</script>

</body>
</html>