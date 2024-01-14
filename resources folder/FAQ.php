<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Blood Link</title>
    <style>
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION["UID"])) {
        include('../public_nav.php');
    } else {
        include('../user_nav.php');
    }
    ?>

    <div class="one">
        <h1>ABOUT BLOOD DONATION</h1>
    </div>
    <div class="criteria">
        <div class="content">
            <h2 style="translate: 0% -45%;">ELIGIBILITY CRITERIA</h2>
            <p>
                <b>Who is eligible to donate blood?</b>
                * Individual in good health need to be between 18 to 65 years are eligible to donate blood.
                <br><br>
                <b>What are the health requirements for blood donation?</b>
                * Donors should be in good general health, free from infections, and not on certain medications.
                <br><br>
                <b>Why I need to donate blood?</b>
                * Your blood saves more than one life when it is separated into its components and improves your healty.
                Blood is needed regularly for patients with diseases such as thalassemia and hemophilia, and also for
                the treatment of injuries after an accident and major surgeries
            </p>
        </div>
    </div>

    <div class="process">
        <div class="content">
            <h2>DONATION PROCESS</h2>
            <p>
                <b>How long does a typical blood donation appointment take?</b>
                * A standard blood donation appointment usually takes about 30 to 45 minutes, including registration,
                health screening, donation, and refreshments afterward.
                The actual donation takes about 10 minutes.
                <br><br>
                <b>How many blood will be taken?</b>
                * Around 450ml, which is less that 1 pain (586ml). Adults usually have almost around 5 litre (10-12
                pain) blood in their body.
                <br><br>
                <b>Is there any discomfort during or after donation?</b>
                * Some donors may experience mild discomfort during the needle insertion, but it is generally
                well-tolerated.
                After donation, rest and refreshments are provided to minimize any post-donation effects.
            </p>
        </div>
    </div>

    <div class="schedule">
        <div class="content">
            <h2 style="translate: 0% -45%;">APPOINTMENT AND SCHEDULLING</h2>
            <p>
                <b>Can I walk in to donate blood, or do I need an appointment?</b>
                * While walk-ins are welcome, scheduling an appointment helps us manage donor flow more efficiently.
                Appointments ensure a smoother donation experience for donors.
                <br><br>
                <b>How can I schedule a blood donation appointment?</b>
                * As for now, the appointments can be scheduled manually through walk-ins, or you can contact our blood bank directly to arrange a convenient time.
                <br><br>
                <b>What information is required when scheduling an appointment?</b>
                * When scheduling an appointment, we typically ask for your name, contact information, and preferred time.
                You may also need to provide basic health information if required.
                <br><br>
                <b>How often can a person donate blood?</b>
                * Donation frequency varies by blood type and donation type. For the whole blood donors can typically donate every 8 weeks.
            </p>
        </div>
    </div>

    <div class="after">
        <div class="content">
            <h2 style="translate: 0% -45%;">POST DONATION</h2>
            <p>
                <b>What should I do after donating blood?</b>
                * After donation, we recommend resting and enjoying refreshments provided at our facility.
                It's essential to stay hydrated and avoid heavy physical activity for a few hours.
                <br><br>
                <b>Are there any restrictions or precautions after donation?</b>
                * We advise donors to avoid heavy lifting or strenuous activities for the rest of the day.
                It's also essential to stay hydrated and follow any specific post-donation guidelines provided by our staff.
                <br><br>
                <b>Can I take consume alcohol and smoking after make a donation?</b>
                * Smoking and alcohol consumption is not recommended after donation.
                Although donors seldom experience discomfort after donating, if you feel light-headed, lie down until the feeling passes.
            </p>
        </div>
    </div>
    <?php include('../footer.php') ?>
</body>

</html>