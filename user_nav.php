<?php
define('BASE_URL', '/Bloodbank');

echo '<nav>
  <div><a href="' . BASE_URL . '/home folder/home.php">BloodLink</a></div>
  <div>
      <a href="' . BASE_URL . '/donation_history/donation_history.php">Donations</a>
      <a href="' . BASE_URL . '/donationblood_bank/blood.php">Blood Inventory</a>
      <a href="' . BASE_URL . '/advertisements/advertisements.php">Advertisments</a>
  </div>
  <div>
      <a href="' . BASE_URL . '/notification/notification.php"><i class="fa-solid fa-bell"></i></a>
      <a href="' . BASE_URL . '/profile/profile.php"><i class="fa-solid fa-user"></i></a>
      <a href="' . BASE_URL . '/user_authentication/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
  </div>
</nav>';
