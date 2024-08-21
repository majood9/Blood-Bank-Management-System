<html>


<head>


    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


</head>




<body onload="window.print();" >



    <div id="wrapper" style=" background-color: white; " >



        <div id="page-wrapper" style="margin-left: 0px; height: 100%; ">

            <div class="container-fluid">

                <div class="row">


                    <div class=".col-lg-12">



                        <h1 class="page-header">Today Tests Details</h1>
                        <div style="display: flex;">
                        <h6 class="page-header">Department:<span style="color: blue; "> Doctor </span> </h6>
                        <img src="../img/Test (Doctor).png " style=" width: 200px; margin-left: 470px; margin-top: -40px; ">
                        <h6 class="page-header" style=" margin-left:27%;">Today`s Date:<span style="color: red"> <?php echo date('Y-m-d'); ?> </span> </h6>
                        </div>

                    </div>
                </div>



                <div class="row">

                    <div class=".col-lg-12">
                        <div class="panel panel-default">

  
                                </form>
                            </div>


                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                        <?php

                                        include "dbconnect.php";
                                        echo "
                                        <thead>
                                        <tr>
                                            
                
                                            <th>The National Number</th>
                                            <th>Name</th>
                                            <th>Date_View</th>
                                            <th>Medication</th>
                                            <th>Eligible</th>
                                            <th>Low_Pressure</th>
                                            <th>High_Pressure</th>
                                            <th>Pulse</th>
                                            <th>Pulse_Rate</th>
                                            <th>Hemoglobin</th>
                                            <th>Weight</th>
                                            <th>Temperature</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>First_Reason</th>
                                            <th>Second_Reason</th>
                                            <th>QR Code</th>
                
                
                
                                        </tr>
                                        </thead>";
                                                        if (isset($_GET['search'])) {
                
                
                                                            $filtervalues = $_GET['search'];
                                                            $d1 = date('Y-m-d');
                                                            $qry = "SELECT * FROM donor,Test WHERE Test.national_id=donor.national and CONCAT(donor.name) LIKE '$filtervalues%' and Test.date_view='$d1'";
                                                            $result = mysqli_query($conn, $qry);
                
                
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo "<tbody>
                          <tr>
                                    <td>" . $row['national_id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                
                          <td>" . $row['date_view'] . "</td>
                          <td>" . $row['medication'] . "</td>
                          <td>" . $row['eligible'] . "</td>
                          <td>" . $row['low_pressure'] . "</td>
                          <td>" . $row['high_pressure'] . "</td>
                          <td>" . $row['pulse'] . "</td>
                          <td>" . $row['pulse_rate'] . "</td>
                          <td>" . $row['hemoglobin'] . "</td>
                          <td>" . $row['weight'] . "</td>
                          <td>" . $row['temperature'] . "</td>
                          <td>" . $row['note'] . "</td>
                          <td>" . $row['status'] . "</td>
                          <td>" . $row['first_reason'] . "</td>
                          <td>" . $row['second_reason'] . "</td>
                          <td>" . '<a href="upload.php?national=' . $row['national'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                
                
                        </tr>
                        <tbody>
                        ";
                                                            }
                                                        } else {
                                                            $d1 = date('Y-m-d');
                
                
                
                
                
                
                
                
                                                            $qry = "SELECT * FROM donor,Test WHERE Test.national_id=donor.national   ";
                                                            $result = mysqli_query($conn, $qry);
                
                
                
                
                
                
                                                            while ($row = mysqli_fetch_array($result)) {
                
                                                                echo "<tbody>
                          <tr>
                                    <td>" . $row['national_id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                
                          <td>" . $row['date_view'] . "</td>
                          <td>" . $row['medication'] . "</td>
                          <td>" . $row['eligible'] . "</td>
                          <td>" . $row['low_pressure'] . "</td>
                          <td>" . $row['high_pressure'] . "</td>
                          <td>" . $row['pulse'] . "</td>
                          <td>" . $row['pulse_rate'] . "</td>
                          <td>" . $row['hemoglobin'] . "</td>
                          <td>" . $row['weight'] . "</td>
                          <td>" . $row['temperature'] . "</td>
                          <td>" . $row['note'] . "</td>
                          <td>" . $row['status'] . "</td>
                          <td>" . $row['first_reason'] . "</td>
                          <td>" . $row['second_reason'] . "</td>
                          <td>" . '<a href="upload.php?national=' . $row['national'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                
                
                        </tr>
                        <tbody>
                        ";
                                                            }
                                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- jQuery -->
            <script src="../vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="../vendor/metisMenu/metisMenu.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="../dist/js/sb-admin-2.js"></script>

</body>


<style>
    footer {
        background-color: #fff;
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