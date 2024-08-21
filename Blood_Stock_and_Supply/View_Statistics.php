<?php

session_start();
// the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}


include "dbconnect.php";
$query         = mysqli_query($conn, "SELECT * FROM Blood_Drainage ");
$num_row     = mysqli_num_rows($query);

$d = date('Y-m-d');
$query1         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE Request_Date = '$d' ");
$num_row1     = mysqli_num_rows($query1);

$query2         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE Priority = 'Urgent'  ");
$num_row2     = mysqli_num_rows($query2);

$query3         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE Priority = 'Not Urgent' ");
$num_row3     = mysqli_num_rows($query3);

$query4         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE Unit_Type = 'PU'  ");
$num_row4     = mysqli_num_rows($query4);

$query5         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE  Unit_Type = 'WB' ");
$num_row5     = mysqli_num_rows($query5);

$query6         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE  Unit_Type = 'RPC' ");
$num_row6     = mysqli_num_rows($query6);

$query7         = mysqli_query($conn, "SELECT * FROM Blood_Drainage WHERE  Unit_Type = 'FFP' ");
$num_row7     = mysqli_num_rows($query7);

// $query6         = mysqli_query($conn, "SELECT * FROM Blood_Separation WHERE Test_Date = '$d' and  Test_HCV_Ab_IgG = 'positive' ");
// $num_row6     = mysqli_num_rows($query6);

// $query7         = mysqli_query($conn, "SELECT * FROM Blood_Separation WHERE Test_Date = '$d' and  Test_HCV_Ab_IgG = 'positive' ");
// $num_row7     = mysqli_num_rows($query7);

// $query3         = mysqli_query($conn, "SELECT * FROM blood WHERE Donation_Date = '$d' and Picking_Type = 'Quadrant' ");
// $num_row3     = mysqli_num_rows($query3);

// $query4         = mysqli_query($conn, "SELECT * FROM blood WHERE Donation_Date = '$d' and Picking_Type = 'Single' ");
// $num_row4     = mysqli_num_rows($query4);



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

        <?php include 'includes/nav.php' ?>

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
                    data: [<?php echo $num_row ; ?>, <?php echo $num_row1  ; ?>, <?php echo $num_row2 ; ?>, <?php echo $num_row3 ; ?>],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(2.55, 2.06, 86, 0.5)'],
                }],
                labels: ['Supplied Total', 'Supplied Today', 'Supplied Urgent', 'Supplied Not Urgent']
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
                    data: [<?php echo $num_row4 ; ?>, <?php echo $num_row5  ; ?>, <?php echo $num_row6; ?>, <?php echo $num_row7 ; ?>],
                    backgroundColor: ['rgba(205, 9.9, 1.32, 105)', 'rgba(54, 16.2, 235, 0.5)', 'rgba(2.55, 206, 86, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                }],
                labels: ['Supplied PU', 'Supplied WB', 'Supplied RBC', 'Supplied FFP']
            },
            options: {
                title: {
                   display: true,
                    text: 'تقسيم الجمهور الى متبرع وسبب التبرع'
                }
            }
        });
    </script></div>


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