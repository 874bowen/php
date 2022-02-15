<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ivan</title>

    </head>
    <body>
        <p>Here is an awesome page content</p>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>

    <script>
    $(window).resize(function(){
        console.log('.resize() called. width='+
    $(window).width()+' height ='+$(window).height());
    });

    </script>
    </body>
</html>
