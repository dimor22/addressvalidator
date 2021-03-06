<?php
/**
 * Created by PhpStorm.
 * User: David Lopez
 * Date: 6/9/16
 * Time: 4:38 PM
 *
 *
 * This application uses Bootstrap 3 and Datatable plugin on the front-end.
 * I've used Idiorm as a ORM that works on top of PDO for compatibility.
 * And the rest of the php code is just from scratch.
 * Composer and namespaces are also used.
 */

require_once 'vendor/autoload.php';

date_default_timezone_set('America/Los_Angeles');

require_once 'config/db.php';

use App\Address2;


$addressvalidator = new Address();

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="inc/css/style.css"/>
        <link rel="stylesheet" href="inc/css/table.css"/>

        <title>Address Validator</title>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

        <!-- Datatables plugin scripts -->
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>



    </head>

    <body>
    <div class="container">
        <!-- FORM -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Validate new Address - <small>All fields are required</small></h2>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default" id="submit">Submit</button>
                        <img src="inc/img/ActivityIndicator.gif" id="indicator" width="30" />
                        <span id="errormsg"></span>

                    </div>

                </form>
            </div>
        </div>
        <hr/>
        <!-- TABLE -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Validated Addresses</h2>

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                </tr>
                </tfoot>
                <tbody>
                <?php

                    foreach($addressvalidator->getAll() as $address){
                        echo '<tr>';
                        echo '<td>' . $address['validated_address1'] . '</td>';
                        echo '<td>' . $address['validated_city'] . '</td>';
                        echo '<td>' . $address['validated_state'] . '</td>';
                        echo '<td>' . $address['validated_zip'] . '</td>';
                        echo '</tr>';
                    }

                ?>
                </tbody>
            </table>
            </div>
        </div>

    </div>
    <script src="inc/js/avalidator.js"></script>
</body>
</html>





