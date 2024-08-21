<!DOCTYPE html>
<html lang="en">

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

<body>

    <div id="wrapper">

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BBMS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MESSAGE BOX
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#" method="post">

								<?php
									include 'dbconnect.php';
										$Test_Number =  $_POST['Test_Number'];

                                        $Donation_Number = $_POST['Donation_Number'];
                                        $Test_Date = $_POST['Test_Date'];
                                        $Test_HBsAg = $_POST['Test_HBsAg'];
                            
                                        $Test_HCV_Ab_IgG = $_POST['Test_HCV_Ab_IgG'];
                                        $Test_HIV_1_2_Ag_Ab = $_POST['Test_HIV_1_2_Ag_Ab'];
                                        $Test_Syphilis_Ab = $_POST['Test_Syphilis_Ab'];
                                        $Stereotyping_Capital_C = $_POST['Stereotyping_Capital_C'];
                                        $Stereotyping_Capital_E = $_POST['Stereotyping_Capital_E'];
                                        $Stereotyping_Small_c = $_POST['Stereotyping_Small_c'];
                                        $Stereotyping_Small_e = $_POST['Stereotyping_Small_e'];
                                        $Stereotyping_Capital_K = $_POST['Stereotyping_Capital_K'];
										//update query
										$qry = "update Blood_Test set  Test_HBsAg='$Test_HBsAg',Test_HCV_Ab_IgG='$Test_HCV_Ab_IgG', Test_HIV_1_2_Ag_Ab='$Test_HIV_1_2_Ag_Ab', Test_Syphilis_Ab='$Test_Syphilis_Ab', Stereotyping_Capital_C='$Stereotyping_Capital_C', Stereotyping_Capital_E='$Stereotyping_Capital_E', Stereotyping_Small_c='$Stereotyping_Small_c', Stereotyping_Small_e='$Stereotyping_Small_e', Stereotyping_Capital_K='$Stereotyping_Capital_K' where Test_Number='$Test_Number'";
										$result = mysqli_query($conn,$qry); //query executes
										if(!$result){
											echo"ERROR";
										}else {
											echo"SUCCESSFULLY UPDATED";
											// header ("Location:editblood.php");
										}
								?>

                                  </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>


	
	<style>
	footer{
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
