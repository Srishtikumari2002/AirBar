<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback</title>

    <link rel="stylesheet" href="Css/feedback.css" />
    <script defer src="Js/feedback.js"></script>
</head>

<body>
    <div id="panel" class="panel-container">
        <strong>How satisfied are you with our<br/>airways web service?</strong>
        <div class="ratings-container">
            <div class="rating">
                <img src="Unhappy.png" alt=""/>
                <small>Unhappy</small>
            </div>
            <div class="rating">
                <img src="Neutral.png" alt=""/>
                <small>Neutral</small>
            </div>
            <div class="rating active">
                <img src="Satisfied.png" alt=""/>
                <small>Satisfied</small>
            </div>
        </div>
        <button class="btn" id="send">Send review</button>
    </div>
</body>

</html>