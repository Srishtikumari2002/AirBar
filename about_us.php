<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title of the page  -->
    <title>Dashboard</title>

    <!-- css stylesheets -->

    <!-- favicon -->
    <link rel="icon" href="Images/favicon.png" type="image/png">

    <!-- javascript files -->
    <script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2/webcomponents-loader.min.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/gh/zerodevx/zero-md@1/src/zero-md.min.js"></script>

</head>

<body>

    <?php include("Includes/header.php"); ?>
    <div style="background: #004aad;height: 6.6rem;"></div>

    <zero-md src="README.md"></zero-md>

    <main style="height: 5vh;"></main>

    <?php include("Includes/footer.php"); ?>

</body>

</html>