<?php
session_start();
if(isset($_POST['reset'])){
    $_SESSION['chat']= Array();
    header("Location: ind-json.php");
    return;
}
if(isset($_POST['message'])){
    if(!isset($_SESSION['chats'])) $_SESSION['chats'] = Array();
    $_SESSION['chats'] [] = array($_POST['message'], date(DATE_RFC2822));
    header("Location: ind-json.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Chat</h1>
        <form action="index.php" method="post">
            <p>
                <input type="text" name="message" size="60"/>
                <input type="submit" value="Chat"/>
                <input type="submit" name="reset" value="Reset">
            </p>
        </form>
        <div id="chatcontent">
            <img src="../fade-spinner.gif" alt="Loading..."/>
        </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    function updateMsg(){
        window.console && console.log("Requesting JSON");
        $.getJSON('chatlist.php', function(rowz){
            window.console && console.log("Requesting JSON");
            window.console && console.log(rowz);
            $("#chatcontent").empty();
            for (var i = 0; i < rowz.length; i++) {
                entry = rowz[i];
                $("#chatcontent").append('<p>'+entry[0]+
                    '<br/>&nbsp;'+entry[1]+'</p>\n');
            }
            setTimeout('updateMsg()', 4000)
        });
    }
    //make sure JSON requests are not cached
    $(document).ready(function(){
        $.ajaxSetup({cache : false});
        updateMsg(); //Call the first time to get things started
    });
    </script>
    </body>
</html>
