<?php

session_start();
//the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}


include "dbconnect.php";
$query         = mysqli_query($conn, "SELECT * FROM donor,status where donor.national=status.national");
$num_row     = mysqli_num_rows($query);

$query1         = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id ");
$num_row1     = mysqli_num_rows($query1);
$date = date('Y-m-d');
$query2        = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id and Test.date_view='$date'");
$num_row2     = mysqli_num_rows($query2);

$d = date('Y-m-d');
$query4         = mysqli_query($conn, "SELECT * FROM donor,status where donor.national=status.national and status.date_view='$d'");
$num_row4     = mysqli_num_rows($query4);

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
</head>

<body>

    <div id="wrapper">

        <?php include 'includes/Doctor_nav.php' ?>

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
                                    <i class="icofont-users icofont-5x" style='color:rgba(220, 20, 60, 0.8)'></i>
                                    <!-- <i class="fa fa-heartbeat fa-5x"></i> -->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- in order to count total donor's record -->
                                    <?php echo $num_row; ?>

                                    <div>Available Total Donors</div>
                                </div>
                            </div>
                        </div>
                        <a href="viewdonor.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Donors Details</span>
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
                                    <i class="icofont-clock-time icofont-5x" style='color:rgba(220, 20, 60, 0.8)'></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <!-- in order to count total donor's record -->

                                    <!-- <div class="huge">26</div> -->
                                    <?php echo $num_row4; ?>
                                    <div>Available Today Donors</div>
                                </div>
                            </div>
                        </div>

                        <a href="view_today_donor.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Today Donor Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right "></i></span>
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
                                    <i class="fa fa- icofont-test-tube fa-5x" style='color:rgba(220, 20, 60, 0.8)'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> </div>
                                    <?php echo $num_row1; ?>
                                    <div>Available Total Teats</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_test.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Total Tests Details</span>
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
                                    <i class="fa icofont-test-tube icofont-5x" style='color:rgba(220, 20, 60, 0.8)'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php echo $num_row2; ?>
                                    <div>Available Today Teats</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_test_today.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Today Tests Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <br><br><br>
                <br><br><br>
                <div style="margin-left: -400px;  width:500px; height:500px;" class="col-lg-4 col-md-6">
                    <hr style="margin-top:200px; width:1100px; height: 10px; color:red;">
                <!-- <br><br><br> <br><br><br> <br><br><br> <canvas style="margin-top:-180px;" id="myChart" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $num_row ; ?>, <?php echo $num_row1  ; ?>, <?php echo $num_row4 ; ?>],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                }],
                labels: ['Donor Patients', 'Donor Voluntary', 'Donor Substitute']
            },
            options: {
                title: {
                   display: true,
                    text: 'تقسيم الجمهور الى متبرع وسبب التبرع'
                }
            }
        });
    </script></div>
                <div style="margin-left:650px;margin-top:-352px; width:500px; height:500px;" class="col-lg-4 col-md-6">
               <br><br> <canvas style="margin-top:40px;" id="myChart1" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $num_row4 ; ?>, <?php echo $num_row1  ; ?>, <?php echo $num_row4 ; ?>],
                    backgroundColor: ['rgba(205, 9.9, 1.32, 105)', 'rgba(54, 16.2, 235, 0.5)', 'rgba(2.55, 206, 86, 0.5)'],
                }],
                labels: ['Donor Total', 'Donor Today', 'Donor Voluntary']
            },
            options: {
                title: {
                   display: true,
                    text: 'تقسيم الجمهور الى متبرع وسبب التبرع'
                }
            }
        });
    </script></div>

            </div> -->
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