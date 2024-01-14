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
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="../css/nav_footer.css">
	<!-- javascript -->
	<script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.prev {
			translate: -500px;
		}
	</style>
</head>

<body>
	<!-- menu bar -->
	<?php include('../user_nav.php') ?>

	<!-- section 1: registration -->
	<section id="home-registration">
		<div class="home-form">
			<h3>If you are ready to make a difference and save lives, please take a moment to register for blood donation here.</h3>
			<input type="text" placeholder="Full Name" name="fullname" id="fullname">
			<input type="email" placeholder="Email" name="email" id="email">
			<input type="text" placeholder="Phone No" name="phoneno" id="phoneno">
			<div class="home-btn">
				<a class="btn" href="#">Register</a>
			</div>
		</div>
	</section>

	<!-- section 2: advertisements slider -->
	<section id="home-ads">
		<div class="slideshow-container">
			<div class="mySlides fade">
				<img src="img/img1.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
				<img src="img/img2.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
				<img src="img/img3.jpg" style="width:100%">
			</div>

			<a class="prev" onclick="plusSlides(-1)">❮</a>
			<a class="next" onclick="plusSlides(1)">❯</a>
		</div>

		<br>

		<div style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
		</div>
	</section>

	<!-- section 3: news-->
	<section id="home-news">
		<div>
			<h1 style="color:white;">News Highlights<h1>
		</div>
		<div class="news">
			<div class="news-box">
				<div class="details">
					<h3>Local Heroes Save Lives: Record-Breaking Blood Drive Success!</h3><br>
					<p>In a remarkable display of community solidarity, our town surpassed all expectations in the latest blood donation drive. Hundreds of residents turned out to donate, breaking previous records and ensuring a stable blood supply for local hospitals. The event showcased the power of unity and compassion.</p>
				</div>
			</div>
			<div class="news-box">
				<div class="details">
					<h3>Student-Led Blood Donation Campaign Raises Awareness and Pints</h3><br>
					<p>Students from a local high school took the initiative to organize a blood donation campaign, educating their peers and community about the importance of donating blood. The event was a huge success, with dozens of first-time donors contributing to the cause.</p>
				</div>
			</div>
			<div class="news-box">
				<div class="details">
					<h3>Emergency Blood Appeal: Critical Shortage Sparks Urgent Call to Action</h3><br>
					<p>Our city is facing a critical shortage of blood supplies, putting lives at risk. Hospitals urgently appeal to the community to step forward and donate blood. Join the lifesaving mission today and be a hero to those in need.</p>
				</div>

			</div>
		</div>
	</section>

	<!-- footer -->
	<?php include('../footer.php') ?>

	<script>
		let slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			let dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
		}
	</script>
</body>

</html>