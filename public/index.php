<?php

$exemplePath = __DIR__.'/../data';
$files = glob($exemplePath.'/*.php');




?>
<!doctype html>
<html>
<head>
    <link rel="shortcut icon"
          href="resource/eye.png">
    <title>
        Live editor
    </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/black-tie/jquery-ui.css"/>

    <!--
    <link rel="stylesheet" href="assets/style.css"/>
    //-->

    <link rel="stylesheet" href="assets/css/layout.css"/>
    <link rel="stylesheet" href="assets/css/dump.css"/>
    <link rel="stylesheet" href="assets/css/console.css"/>


    <style>

    </style>

</head>
<body>


<main class="editor">
    <nav class="menu-main">test</nav>
    <div class="workspace">
        <div class="panel panel-left">
            <div id="viewer">
                <div id="container"></div>
            </div>
        </div>

        <div class="panel panel-center">
            <div class="panel panel-main">
                <div class="editor" id="editor"></div>
                <!--
                <div class=""></div>
                //-->
            </div>
            <div class="panel console">
                <div id="console"></div>
            </div>
        </div>

        <div class="panel panel-right">

        </div>
    </div>
    <footer class="footer">
        
    </footer>
</main>


<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/js/bootstrap.min.js"></script>

<script src="vendor/ace-builds/src-min/ace.js"></script>
<script src="source/Application.js"></script>

<script src="source/script.js"></script>



<script>


</script>


</body>
</html>