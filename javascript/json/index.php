<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div id="back">
            <p>Before </p>
        </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $.getJSON('json-01.php', function(data){
            $("#back").html(data.first);
            window.console && console.log(data);
        });
    });

    </script>
    </body>
</html>
