<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Blood Link</title>
    <style>
        h2 {
            font-size: 20pt;
            background-color: rgba(255, 255, 255);
            color: #0868a9;
            width: 70%;
            margin: 20px;
        }
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
    <div class="two">
        <h1>PRIVACY POLICY</h1>
    </div>
    <main>
        <div class="intro">
            Welcome to the Blood Link website. This page informs you of our policies regarding the collection, use, and
            disclosure of Personal Information we receive from users of the site.
            <br> By using the site, you agree to the collection and use of information in accordance with this policy.
        </div>
        <div class="policy">
            <div class="policy1">
                <h2>Information Collection and Use</h2>
                <p>
                    While using our site, we may ask you to provide us with certain personally identifiable information
                    that
                    can be used to contact or identify you. Personally identifiable information may include, but is not
                    limited to, your name, email address, phone number, and blood type
                </p>
            </div>
            <div class="policy2">
                <h2>Log Data</h2>
                <p>
                    Like many site operators, we collect information that your browser sends whenever you visit our
                    site.
                    This
                    Log Data may include information such as your computer's Internet Protocol ("IP") address,
                    browser type, browser version, the pages of our site that you visit, the time and date of your
                    visit,
                    the time spent on those pages, and other statistics.
                </p>
            </div>
            <div class="policy3">
                <h2>Security</h2>
                <p>
                    The security of your Personal Information is important to us, but remember that no method of
                    transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to
                    use commercially acceptable means to protect your Personal Information, we cannot guarantee its
                    absolute security.
                </p>
            </div>
            <div class="policy4">
                <h2>Links to Other Sites</h2>
                <p>
                    Our site may contain links to other sites that are not operated by us. If you click on a third-party
                    link, you will be directed to that third party's site. We strongly advise you to review the Privacy
                    Policy of every site you visit.
                </p>
            </div>
        </div>
        <div class="outro">
            <h2 style="translate: 18%; margin-bottom: 30px;">Changes to This Privacy Policy</h2>
            This Privacy Policy is effective as of 16 January 2024 and will remain in effect except with respect to any
            changes in its provisions in the future, which will be in effect immediately after being posted on this
            page.
            <br><br>
            We reserve the right to update or change our Privacy Policy at any time, and you should check this
            Privacy Policy periodically. Your continued use of the service after we post any modifications to the
            Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to
            abide and be bound by the modified Privacy Policy.
            <br><br>
            If we make any material changes to this Privacy Policy, we will notify you either through the email
            address you have provided us or by placing a prominent notice on our website.
        </div>
    </main>
    <?php include('../footer.php') ?>
</body>

</html>