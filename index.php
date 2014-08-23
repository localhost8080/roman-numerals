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
            
            <form class="form" id="numberForm" method="post" action="">
                <fieldset>
                <legend>Please input your value: eg 2014</legend>
                    <p>
                        <label for="number">Number:</label> <input class="form-control" id="number" name="number" type="number" min="1" max="3999" required />
                    </p>
                    <p class="alert alert-success"><b>Result: </b><span id="number_results"></span></p>
                </fieldset>
            </form>
            <form class="form" id="stringForm" method="post" action="">
                <fieldset>
                    <legend>Please input your value: eg MMXIV</legend>
                    <p>
                        <label for="string">String:</label> <input class="form-control" id="string" name="string" type="text" required />
                    </p>
                    <p class="alert alert-success"><b>Result: </b><span id="string_results"></span></p>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
