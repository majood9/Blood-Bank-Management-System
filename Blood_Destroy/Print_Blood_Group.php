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



                        <h1 class="page-header">Today Blood Destroy Group Details</h1>
                        <div style="display: flex;">
                        <h6 class="page-header">Department:<span style="color: blue; "> Blood Destroy </span> </h6>
                        <img src="../img/Blood Destroy.png " style=" width: 200px; margin-left: 470px; margin-top: -40px; ">
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
							
							<th>Destruction Number</th>
							<th>Donation Number</th>
							<th>Destruction Date</th>
							<th>First Reason</th>
							<th>Second Reason</th>
							<th>Blood Group</th>
							<th>Amount Blood</th>
							<th>Donation Date</th>
							


						</tr>
						</thead>";
                                        
                                            $d = date('Y-m-d');







                                            $qry = "select * from Destroy_Blood_Group where B_Destruction_Date = '$d'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                              

                                                echo "<tbody style='color:red;'>
                                                <tr>
                                                          <td>" . $row['B_Destruction_Number'] . "</td>
                                                          <td>" . $row['Donation_Number'] . "</td>
                                                          <td>" . $row['B_Destruction_Date'] . "</td>
                                                          <td>" . $row['B_First_Reason'] . "</td>
                                                          <td>" . $row['B_Second_Reason'] . "</td>
                                                <td>" . $row['B_Blood_Group'] . "</td>
                                                <td>" . $row['B_Amount_Blood'] . "</td>
                                                <td>" . $row['Donation_Date'] . "</td>
                                      
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