<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BloodLink Advertisements</title> 
  <link rel="stylesheet" href="../css/nav_footer.css">
  <link rel="stylesheet" href="css/ads_style.css">
  <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include('../user_nav.php'); //reusable user_nav
  ?>

  <section id="advertisements">
    <div class="ads">
      <div>
        <p>776</p>
        <i class="fa fa-heart" aria-hidden="true"></i>
        <p>Blood Donors</p>
      </div>
      <div>
        <p>33</p>
        <i class="fa fa-heartbeat" aria-hidden="true"></i>
        <p>Special Blood Request</p>
      </div>
      <div>
        <p>5468</p>
        <i class="fa fa-heart" aria-hidden="true"></i>
        <p>Blood Donation Events</p>
      </div>
      <div>
        <p>1398</p>
        <i class="fa fa-wheelchair-alt" aria-hidden="true"></i>
        <p>Suppporting Locations</p>
      </div>
    </div>
  </section>

  <section id="slide-ads">
    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="../home folder/img/img1.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../home folder/img/img2.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../home folder/img/img3.jpg" style="width:100%">
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

  <?php include('../footer.php')?>

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