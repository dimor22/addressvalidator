<?php
/**
 * Created by PhpStorm.
 * User: David Lopez
 * Date: 6/9/16
 * Time: 4:38 PM
 */

require_once 'bootstrap.php';

use App\address;

$addressvalidator = new address();

//$_REQUEST['address'] = "5870 harmon";
//$_REQUEST['city'] = "las vegas";
//$_REQUEST['state'] = "nevada";

if ( $addressvalidator->getInput() ){
    $result = $addressvalidator->validate();
} ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="public/style.css"/>
        <link rel="stylesheet" href="public/table.css"/>

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
                <h2>Validate new Address</h2>
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
                        <button type="submit" class="btn btn-default">Submit</button>
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
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>777 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                <tr>
                    <td>234 Pepe Dr.</td>
                    <td>Las Vegas</td>
                    <td>NV</td>
                    <td>56474</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>





        <div class="row">
            <div class="col-lg-12">

            <?php
            if( !empty($result) ){

                echo "<pre>";
                print_r($addressvalidator->show());
                echo "</pre>";
            }
            ?>
            </div>
        </div>

    </div>
</body>
</html>





