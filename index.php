<?php
// simple front-end for the roman numeral class, using the api
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- some libraries -->
    <!-- jquery and jquery migrate -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>
    <!-- bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- the library that handles all the functionality -->
    <script src="/js/lib.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-xs-12">
            <h1 class="jumbotron">Roman Numerals</h1>
            <form class="form" id="commentForm" method="get" action="">
                <fieldset>
                    <legend>Please input your value:</legend>
                    <p>
                        <label for="number">Number:</label> <input class="form-control" id="number" name="number" type="number" required />
                    </p>
                    <div id="results"></div>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
