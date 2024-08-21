<?php

session_start();
// the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

// include 'dbconnect.php';
// // $qry = "SELECT * FROM donor";
// // $result = mysqli_query($conn, $qry);
// // $row        = mysqli_fetch_array($result);
// // $num_row     = mysqli_num_rows($result);

// // قم بالاستعلام عن البيانات من قاعدة البيانات
// // $conn = new mysqli("localhost", "username", "password", "database_name");
// $sql = "SELECT * FROM donor ";
// $result = $conn->query($sql);

// قم بتجهيز البيانات للمخطط البياني


include "dbconnect.php";
$query         = mysqli_query($conn, "SELECT * FROM donor,status where donor.national=status.national");
$num_row     = mysqli_num_rows($query);

$query1         = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id and Test.date_view='$date' ");
$num_row1     = mysqli_num_rows($query1);

$date = date('Y-m-d');
$query2        = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id and Test.date_view='$date' and Test.eligible = 'No'");
$num_row2     = mysqli_num_rows($query2);

$d = date('Y-m-d');
$query4         = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id and Test.date_view='$d' and Test.status = 'Yes' ");
$num_row4     = mysqli_num_rows($query4);
$d = date('Y-m-d');
$query5         = mysqli_query($conn, "SELECT * FROM donor,Test where donor.national=Test.national_id and Test.date_view='$d' and Test.status = 'No'");
$num_row5    = mysqli_num_rows($query5);


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






    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['national']
                
                $sql = "SELECT * FROM donor ";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "[" . $row["bloodgroup"] .  "]";
                } 
                

            ]);

            var options = {

                chart: {
                    title: 'Total Available donors According to national..'

                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script> -->



</head>

<body>

    <div id="wrapper">

        <?php include 'includes/Doctor_nav.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statistics
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                
                <div style="width:500px; height:500px;" class="col-lg-4 col-md-6">
                    <!-- <hr style="margin-top:200px; width:1100px; height: 10px; color:red;"> -->
                <br><br><br> <br><br><br> <br><br><br> <canvas style="margin-top:-180px;" id="myChart" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $num_row ; ?>, <?php echo $num_row1  ; ?>, <?php echo $num_row2 ; ?>],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                }],
                labels: ['Total Tests', 'Today Tests', 'Eligible Tests']
            },
            options: {
                title: {
                   display: true,
                    text: 'تقسيم الجمهور الى متبرع وسبب التبرع'
                }
            }
        });
    </script></div>
                <div style=" width:600px; height:600px;" class="col-lg-4 col-md-6">
               <br><br> <canvas style=" margin-top:-40px; margin-left: 100px; " id="myChart1" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $num_row1 ; ?>, <?php echo $num_row4  ; ?>, <?php echo $num_row5 ; ?>],
                    backgroundColor: ['rgba(205, 9.9, 1.32, 105)', 'rgba(54, 16.2, 235, 0.5)', 'rgba(2.55, 206, 86, 0.5)'],
                }],
                labels: ['Today Test', 'Accepted Tests', 'Unaccepted Tests']
            },
            options: {
                title: {
                   display: true,
                    text: 'تقسيم الجمهور الى متبرع وسبب التبرع'
                }
            }
        });
    </script></div>


                <!-- <form id="dataForm" style="width:200px; height:200px;">
        <label for="value1">القيمة 1:</label>
        <input type="number" id="value1" required ><br>

        <label for="value2">القيمة 2:</label>
        <input type="number" id="value2" required ><br>

        <label for="value3">القيمة 3:</label>
        <input type="number" id="value3" required ><br>

        <button type="submit">عرض المخطط</button>
    </form>
    <canvas id="myChart" width="100%" height="100px"></canvas>
    
    <script>
        document.getElementById('dataForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const value1 = parseFloat(document.getElementById('value1').value);
            const value2 = parseFloat(document.getElementById('value2').value);
            const value3 = parseFloat(document.getElementById('value3').value);

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['القيمة 1', 'القيمة 2', 'القيمة 3'],
                    datasets: [{
                        label: 'المخطط الدائري',
                        data: [value1, value2, value3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'مخطط دائري مفرغ'
                        }
                    }
                }
            });
        });
    </script> -->

                <!-- <canvas id="myChart"></canvas>
                
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets: [{
            data: [<?php  echo $num_row5 ?>, <?php echo $num_row1 ?>],
            backgroundColor: [
                'rgba(220, 20, 60, 0.8)', // لون القطرة
                'rgba(255, 255, 255, 0.8)', // لون الخلفية
                'rgba(0, 0, 255, 0.8)' // لون زمرة الدم
            ],
        }],
        labels: ['ID', 'Date of Donation']
    },
    options: {
        legend: {
            display: false
        }
    }
});
</script> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flag fa-5x" style='color:darkred'></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php include 'counter/dashboardcampaigncount.php'; ?>

                                    <div>Campaigns Made</div>
                                </div>
                            </div>
                        </div>

                        <a href="userviewcampaigns.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Available Campaigns</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x" style='color:darkred'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php include 'counter/dashannouncecount.php'; ?>
                                    <div class="huge"> </div>
                                    <div>Announcement</div>
                                </div>
                            </div>
                        </div>
                        <a href="userviewannouncement.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Announcement Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="text-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="icofont-blood-drop icofont-5x" style='color:red'></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Donate</div>
                                    <div>Blood</div>
                                </div>
                            </div>
                        </div>
                        <a href="useraddblood.php">
                            <div class="panel-footer">
                                <span class="pull-left">Donate Blood Now!</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

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