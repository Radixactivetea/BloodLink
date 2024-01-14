<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>ABOUT US</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/nav_footer.css">
	<link rel="stylesheet" href="css/about_us.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
</head>

<body>


	<?php
	if (!isset($_SESSION["UID"])) {
		include('../public_nav.php');
	} else {
		include('../user_nav.php');
	}
	?>

	<div class="heading">
		<h1>About Us</h1>
		<p>DONATE YOUR BLOOD AND INSPIRE OTHERS TO DONATE.</p>
	</div>
	<section class="about-us">
		<img src="img/blood.png">
		<div class="content">
			<h2>Welcome to our Blood Bank System</h2>
			<p>Welcome to Blood Bank System, a dedicated platform committed to saving lives through efficient blood management.
				Our organization plays a crucial role in ensuring a steady and safe supply of blood for medical emergencies, surgeries, and various healthcare needs.</p>


			<!-- Updated button onclick to toggle the display of service section -->
			<a onclick="toggleService()" style="cursor: pointer;">Read More</a>
		</div>
	</section>
	<div id="wrapperDiv">
		<div class="wrapper" id="service-section"> <!-- Added an id to the service section -->
			<h1>SERVICE WE PROVIDE</h1>
			<div class="service">
				<div class="service_provide">
					<div class="img">
						<img src="img/blood1.png" alt="service_img">
					</div>
					<h3>Blood Donation:</h3>
					<p>Providing a platform for individuals to donate blood and contribute to saving lives.</p>
				</div>
				<div class="service_provide">
					<div class="img">
						<img src="img/blood2.png" alt="service_img">
					</div>
					<h3>Blood Testing:</h3>
					<p>Ensuring the safety and quality of donated blood through rigorous testing procedures.</p>
				</div>
				<div class="service_provide">
					<div class="img">
						<img src="img/blood3.png" alt="service_img">
					</div>
					<h3>Blood Distribution</h3>
					<p>Facilitating the timely and efficient distribution of blood to hospitals and healthcare facilities.</p>
				</div>


			</div>
			<h1> CONTACT DETAIL</h1>
			<div class="contact">
				<div class="contact_detail">
					<div class="img">
						<img src="img/blood6.png" alt="contact_img">
					</div>
					<h3>ADDRESS:</h3>
					<p>Jalan Tuaran Bypass, Bukit Harapan, 88450 Kota Kinabalu, Sabah</p>
					<h3>EMAIL:</h3>
					<p>donate@bloodlinkconnect.org</p>
					<h3>PHONE NO</h3>
					<p>+60 123 456 7890.</p>
					<h3>CAREERS:</h3>
					<p>Are you passionate about making a difference in people's lives? Join our team at Bloodlink and be a part of a dedicated group committed to saving lives. Explore career opportunities with us and contribute to a cause that goes beyond a job – it's a calling.

						To inquire about current job openings or submit your resume, please contact our HR department at donate@bloodlinkconnect.org or +60 123 456 7890.

						Thank you for being a part of the Bloodlink family. Together, we can continue to write stories of hope, one donation at a time.</p>
				</div>
			</div>
		</div>
	</div>
	</div>
    <?php include('../footer.php') ?>
	<script>
		function toggleService() {
			var x = document.getElementById("service-section");
			x.style.display = (x.style.display === 'none') ? 'block' : 'none';
		}
	</script>
</body>

</html>