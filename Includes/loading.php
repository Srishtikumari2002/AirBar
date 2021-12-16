<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Loader</title>

    <style>
        #loader {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            z-index: 1;
            overflow: visible;
            background: #fff url('Images/loader.gif') no-repeat center center;
            background-size: 100% 100%;

        }
    </style>

</head>

<body>
    
    <div id="loader"></div>

    <script>
        //  pre loader 

        var loader;

        function loadNow(opacity) {
            if (opacity <= 0) {
                displayContent();
            } else {
                loader.style.opacity = opacity;
                window.setTimeout(function() {
                    loadNow(opacity - 0.05);
                }, 50);
            }
        }

        function displayContent() {
            loader.style.display = 'none';
        }

        document.addEventListener("DOMContentLoaded", function() {
            loader = document.getElementById('loader');
            loadNow(1);
        });

    </script>

</body>

</html>