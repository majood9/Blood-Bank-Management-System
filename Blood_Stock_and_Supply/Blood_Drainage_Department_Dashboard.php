<?php

session_start();
//the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}
                                                    

include "dbconnect.php";
$query         = mysqli_query($conn, "SELECT * FROM Blood_Stock");
$num_row     = mysqli_num_rows($query);

$query1         = mysqli_query($conn, "SELECT * FROM Blood_Separation WHERE Unit_Type='RBC' ");
$num_row1     = mysqli_num_rows($query1);

// $date = date('Y-m-d');
// $query2        = mysqli_query($conn, "SELECT * FROM Blood_Stock where date('Y-m-d')='$date'");
// $num_row2     = mysqli_num_rows($query2);

$query4         = mysqli_query($conn, "SELECT * FROM Blood_Stock where Unit_Type='FFP'");
$num_row4     = mysqli_num_rows($query4);

$query5         = mysqli_query($conn, "SELECT * FROM Blood_Stock where Unit_Type='PU' ");
$num_row5     = mysqli_num_rows($query5);

$date2=date('Y-m-d');
$query6         = mysqli_query($conn, "SELECT * FROM Blood_Stock where Unit_Type='WB' ");
$num_row6     = mysqli_num_rows($query6);



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <!-- <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['bloodgroup', 'Number'],
                  
                        //   while($row = mysqli_fetch_array($result))  
                        //   {  
                        //        echo "['".$row["bloodgroup"]."', ".$row["number"]."],";  
                               
                        //   }  
                          
            ]);

            var options = {

                chart: {
                    title: 'Total Available Blood According to Blood Groups'

                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        </script> -->


</head>

<body>

    <div id="wrapper">

        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style='color:black'>Dashboard
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa icofont-blood-drop icofont-5x" style='color:red'></i>
                                    <!-- <i class="fa fa-heartbeat fa-5x"></i> -->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- in order to count total donor's record -->
                                    <?php echo $num_row; ?>

                                    <div>Available Total Stock Blood</div>
                                </div>
                            </div>
                        </div>
                        <a href="View_Blood_Stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Stock Blood Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                
                                    <?php echo $num_row2; ?>
                                    <div>Available Today Stock Bloods</div>
                                </div>
                            </div>
                        </div>

                        <a href="View_Today_Blood_Separation.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Today Stock Blood Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

                <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> </div>
                                    <?php echo $num_row1; ?>
                                    <div>Available Total Stock Blood (RBC)</div>
                                </div>
                            </div>
                        </div>
                        <a href="View_RBC_Blood_Stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Stock Blood (RBC)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php echo $num_row4; ?>
                                    <div>Available Total Stock Blood (FFP)</div>
                                </div>
                            </div>
                        </div>
                        <a href="View_FFP_Blood_Stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Stock Blood (FFP)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php echo $num_row5; ?>
                                    <div>Available Total Stock Blood (PU)</div>
                                </div>
                            </div>
                        </div>
                        <a href="View_PU_Blood_Stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Stock Blood (PU)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php echo $num_row6; ?>
                                    <div>Available Total Stock Blood (WB)</div>
                                </div>
                            </div>
                        </div>
                        <a href="View_WB_Blood_Stock.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Stock Blood (WB)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- <div class="container">
	<div class="row">
	<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong><i class="fa fa-warning"></i> You Are Currently Viewing User's Account</strong> <marquee><p style="font-family: Impact; font-size: 18pt">You Are Currently Viewing User's Account</p></marquee>
</div> -->



            <div class="row">

                <div class=".col-lg-12">

                    <div id="content">

                        <div class="container-fluid">

                            <div class="row-fluid">

                                <div class="span12">

                                    <div id="columnchart_material" style="width: 1000px; height: 500px;margin: auto; "></div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


</body>



<style>
    footer {
        background-color: #424558;
        bottom: 0;
        left: 0;
        right: 0;
        height: 35px;
        text-align: center;
        color: #CCC;
    }

    footer p {
        padding: 10.5px;
        margin: 0px;
        line-height: 100%;
    }
</style>

</html>