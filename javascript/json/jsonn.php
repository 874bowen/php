
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>JSON wire protocol</p>
        <div id="back">

        </div>
         <script>

            balls = {
                "golf" : "Golf balls",
                "tennis" : "Tennis balls",
                "ping" : "Ping Pong balls"
            };
            balls.soccer = "Soccer balls";
            balls["lacross"] = "Lacross balls";

            who = {
                "name" : "Ivan",
                "age" : 20,
                "college" : true,
                "offices" : ['Nakuru', 'Nairobi', 'Eldoret'],
                "skills" : {'C' : 10,
                    'C++' : 6,
                    'PHP' : 10,
                    'Reactjs' : 5,
                    'Javascript' : 6
                    }
            };
            window.console && console.log(who);
            console.dir(balls);
            console.log(balls);
        </script>
    </body>
</html>
