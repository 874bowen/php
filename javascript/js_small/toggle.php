<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ivan</title>

    </head>
    <body>
        <p id="para">Where is the Spinner?
            <img id="spinner" src="fade-spinner.gif" height="25"
            style="vertical-align: middle; display:none;">
        </p>
        <p><a href="#" onclick="$('#spinner').toggle();
             return false;">toggle</a></p>
        <p><a href="#" onclick="$('#para').css('background-color', 'red');
            return false;">red</a></p>
        <p><a href="#" onclick="$('#para').css('background-color', 'green'); 
            return false;">green</a></p>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>

    </body>
</html>
