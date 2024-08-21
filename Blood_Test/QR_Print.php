<!DOCTYPE html>
<html lang="en">

<head>
    <!-- معلومات عن الصفحة -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>

    <!-- روابط CSS اللازمة -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- JavaScript لدعم HTML5 وردود الفعل -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <!-- شريط التنقل -->
        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Test's Detail</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <!-- <div class="row"> -->
                                    <div class="col-lg-6">
                                        <?php

                                        include "dbconnect.php";
                                        

                                        $id = $_GET['Test_Number'];
                                        // $date_view = $_GET['date_view'];





                                        $qry = "select  * from Blood_Test where Test_Number='$id' ";
                                        $result = mysqli_query($conn, $qry);
    
    
    
    
    
    
    
                                        while ($row = mysqli_fetch_array($result)) {
                                            $Test_Number = $row["Test_Number"];
                                            $Donation_Number = $row["Donation_Number"];
                                            $Test_Date = $row["Test_Date"];
                                            $Test_HBsAg = $row["Test_HBsAg"];
                                            $Test_HCV_Ab_IgG = $row["Test_HCV_Ab_IgG"];
                                            $Test_HIV_1_2_Ag_Ab = $row["Test_HIV_1_2_Ag_Ab"];
                                            $Test_Syphilis_Ab = $row["Test_Syphilis_Ab"];
                                            $Stereotyping_Capital_C = $row["Stereotyping_Capital_C"];
                                            $Stereotyping_Capital_E = $row["Stereotyping_Capital_E"];
                                            $Stereotyping_Small_c = $row["Stereotyping_Small_c"];
                                            $Stereotyping_Small_e = $row["Stereotyping_Small_e"];
                                            $Stereotyping_Capital_K = $row["Stereotyping_Capital_K"];
                                            
                                  
    
    
    
                                        ?>
                                            <form role="form" action="#" method="post" >

                                                <?php echo '<img style="width:250px; height:250px; margin-left:70%;" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code">' ?>
                                                <!-- أجزاء نموذج إضافة تفاصيل المتبرع -->
                                                <div class="form-group">
                                                    <label>Test Number</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_Number ?>" name="Test_Number" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Donation Number</label>
                                                    <input class="form-control" name="Donation_Number" placeholder="<?php echo $Donation_Number ?>" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test Date</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_Date ?>" name="Test_Date" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test HBsAg</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_HBsAg ?>" name="Test_HBsAg" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test HCV Ab & IgG</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_HCV_Ab_IgG ?>" name="Test_HCV_Ab_IgG" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test HIV 1/2 Ag & Ab</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_HIV_1_2_Ag_Ab ?>" name="Test_HIV_1_2_Ag_Ab" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test Syphilis Ab</label>
                                                    <input class="form-control" placeholder="<?php echo $Test_Syphilis_Ab ?>" name="Test_Syphilis_Ab" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stereotyping Capital C</label>
                                                    <input class="form-control" placeholder="<?php echo $Stereotyping_Capital_C ?>" name="Stereotyping_Capital_C" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stereotyping Capital E</label>
                                                    <input class="form-control" placeholder="<?php echo $Stereotyping_Capital_E ?>" name="Stereotyping_Capital_E" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stereotyping Small c</label>
                                                    <input class="form-control" placeholder="<?php echo $Stereotyping_Small_c ?>" name="Stereotyping_Small_c" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Test Syphilis Ab</label>
                                                    <input class="form-control" placeholder="<?php echo $Stereotyping_Small_e ?>" name="Stereotyping_Small_e" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stereotyping Capital K</label>
                                                    <input class="form-control" placeholder="<?php echo $Stereotyping_Capital_K ?>" name="Stereotyping_Capital_K" required disabled>
                                                </div>
                                                
                                                
                                              
    
                                                <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%"> <a href="uploadPrint.php?Test_Number=<?php echo $row['Test_Number'] ?>" style="color:white;">Print QR Code</a></button>
                                                <!-- <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;>Print QR Code</button> -->
                                            </form>

                                        <?php } ?>



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
            <!-- /.containerfluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- النصوص البرمجية -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

<style>
    /* تنسيق قسم الفوتر */
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