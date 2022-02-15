<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form id="target">
            <input type="text" name="one" value="Hello There"
            style="vertical-align:middle;"/>
            <img src="indicator.gif" id ="spinner" height="25"
            style="vertical-align:middle; display:none;">
        </form>
        <div id="result"></div>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
            <script>
            $('#target').change(function(event){
                $('#spinner').show();
                var form = $('#target');
                var txt = form.find('input[name="one"]').val();
                window.console && console.log('Sending POST');
                $.post('autoecho.php', {'val': txt},
            function (data){
                window.console && console.log(data);
                $('#result').empty().append(data);
                $('#spinner').hide();
            }
        ).fail(function(){
            $('#target').css('background-color', 'red');
            alert("Dang!!");
        });
            });
            </script>
    </body>
</html>
