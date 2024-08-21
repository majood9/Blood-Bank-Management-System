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



                        <h1 class="page-header">Today Blood Separation Details</h1>
                        <div style="display: flex;">
                        <h6 class="page-header">Department:<span style="color: blue; "> Blood Stock </span> </h6>
                        <img src="../img/Blood Supply.png " style=" width: 200px; margin-left: 470px; margin-top: -40px; ">
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
							
							<th>Request Number</th>
							<th>Stock Number</th>
							<th>Request Party</th>
							<th>Request Date</th>
							<th>Financier</th>
							<th>Priority</th>
							<th>Recipient Name</th>
							<th>Unit Type</th>
							<th>Blood Group</th>
							<th>Amount Blood</th>
							<th>QR Code</th>


						</tr>
						</thead>";
                                        
                                            $d = date('Y-m-d');







                                            $qry = "select * from Blood_Drainage where Request_Date = '$d'	   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
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