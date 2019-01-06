<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <?php /* uncomment to debug and print the session data here: */ 
            /*print_r($_SESSION)*/ ?>
             <form class="form-horizontal" action="<?php echo site_url() ?>login" method="post">
             <p> already register ?  </p>
                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="login" class="btn btn-default">Login</button>
                    </div>
                </div>
             </form>
            <form class="form-horizontal" action="<?php echo site_url() ?>/register/checkregist" method="post">
                <?php 
                if ($error != "") { ?>
                <div class="form-group alert alert-danger">
                    <label class="col-sm-6">
                        <?php echo $error;?>
                    </label>
                </div>
                <?php
                }
                ?>
               
                <h2>Please register</h2>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                </div>
               
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>