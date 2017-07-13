<?php   
    $config = Config::singleton();
?>

<html>
    <head>
        <style type="text/css">
        #header{
            width: 500px;
            min-height: 60px;
            background-color: dimgrey;
        }

        #header #logo_header{
            width: 50px;
            height: 50px;
            background-size: 100% 100%;
            vertical-align: top;
            display: inline-block;
            padding: 5px;
        }


        #header #titulo_header{
            width: 420px;
            height: 50px;
            vertical-align: top;
            display: inline-block;
            font-size: 50px;
            color: #ffcf00;
            text-shadow: 3px 3px 3px #121212;
        }
        </style>
    </head>
    <body>
        <header id="header">
            <img id="logo_header" src="assets/template/icon.png"/>
            <div id="titulo_header"><label>IPPARKING</label></div>
        </header>
    </body>
</html>