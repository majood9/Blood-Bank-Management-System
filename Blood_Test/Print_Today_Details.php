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



                        <h1 class="page-header">Today Blood Test Details</h1>
                        <div style="display: flex;">
                        <h6 class="page-header">Department:<span style="color: blue; "> Blood Test </span> </h6>
                        <img src="../img/Blood Tes.png " style=" width: 200px; margin-left: 470px; margin-top: -40px; ">
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
                                        $d1 = date('Y-m-d');




                                        echo "
                                        <thead>
                                        <tr>
                                            
                                            <th>Test Number</th>
                                            <th>Donation Number</th>
                                            <th>Test_Date </th>
                
                                            <th>Test_HBsAg</th>
                                            <th>Test_HCV_Ab_IgG</th>
                                            <th>Test_HIV_1/2_Ag_Ab</th>
                                            <th>Test_Syphilis_Ab</th>
                                            <th>Stereotyping Capital C</th>
                                            <th>Stereotyping Capital E</th>
                                            <th>Stereotyping Small c</th>
                                            <th>Stereotyping Small c</th>
                                            <th>Stereotyping Capital K</th>
                                            <th>QR Code</th>
                
                
                                        </tr>
                                        </thead>";
                                        
                                            $d = date('Y-m-d');







                                            $qry = "select * from Blood_Test where Test_Date = '$d'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Test_Number'] . "</td>
                                      
                                                <td>" . $row['Donation_Number'] . "</td>
                                                <td>" . $row['Test_Date'] . "</td>
                                                <td>" . $row['Test_HBsAg'] . "</td>
                                                <td>" . $row['Test_HCV_Ab_IgG'] . "</td>
                                                <td>" . $row['Test_HIV_1_2_Ag_Ab'] . "</td>
                                                <td>" . $row['Test_Syphilis_Ab'] . "</td>
                                                <td>" . $row['Stereotyping_Capital_C'] . "</td>
                                                <td>" . $row['Stereotyping_Capital_E'] . "</td>
                                                <td>" . $row['Stereotyping_Small_c'] . "</td>
                                                <td>" . $row['Stereotyping_Small_e'] . "</td>
                                                <td>" . $row['Stereotyping_Capital_K'] . "</td>
                                                <td>" . '<a href="uploadPrint.php?Test_Number=' . $row['Test_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
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