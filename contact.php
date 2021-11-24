<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- title of the page  -->
  <title>Contact Us</title>

  <!-- css stylesheets -->
  <link rel="stylesheet" href="Css/contact.css">

  <!-- favicon -->
  <link rel="icon" href="Images/favicon.png" type="image/png">

  <!-- javascript files -->

</head>

<body>

  <?php include("Includes/header.php"); ?>

  <div style="background: #004aad;height: 6.6rem;"></div>

  <div class="con-container">
    <div class="content">
      <div class="left-side">
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+91 9310519210</div>
          <div class="text-two">+91 8076654886</div>
          <div class="text-one">+91 8766393891</div>

        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">simran033btcsai20@gmail.com</div>
          <div class="text-two">simran065btcsai20@igdtuw.ac.in</div>
          <div class="text-two">srishti060btcsai20@igdtuw.ac.in</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from
          here. It's my pleasure to help you.</p>
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder="Enter your name">
          </div>
          <div class="input-box">
            <input type="text" placeholder="Enter your email">
          </div>
          <div class="input-box message-box">
            <textarea placeholder="Enter your message"></textarea>
          </div>
          <div class="button">
            <input type="button" value="Send Now">
          </div>
        </form>
      </div>
    </div>
</div>

    <?php include("Includes/footer.php"); ?>

</body>

</html>