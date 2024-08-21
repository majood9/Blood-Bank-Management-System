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
                        <h1 class="page-header">Blood's Detail</h1>
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
                                        

                                        $id = $_GET['Donation_Number'];
                                        // $date_view = $_GET['date_view'];





                                        $qry = "select  * from Blood where Donation_Number='$id' ";
                                        $result = mysqli_query($conn, $qry);
    
    
    
    
    
    
    
                                        while ($row = mysqli_fetch_array($result)) {
                                            $Donation_Number = $row["Donation_Number"];
                                            $Donor_Number = $row["Donor_Number"];
                                            $national = $row["national"];
                                            $Donation_Date = $row["Donation_Date"];
                                            $Blood_Group = $row["Blood_Group"];
                                            $Amount_Blood = $row["Amount_Blood"];
                                            $Picking_Type = $row["Picking_Type"];
                                            
                                  
    
    
    
                                        ?>
                                            <form role="form" action="#" method="post" >

                                                <?php echo '<img style="width:250px; height:250px; margin-left:70%;" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code">' ?>
                                                <!-- أجزاء نموذج إضافة تفاصيل المتبرع -->
                                                <div class="form-group">
                                                    <label>Donation Number</label>
                                                    <input class="form-control" placeholder="<?php echo $Donation_Number ?>" name="Donation_Number" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Donation Code</label>
                                                    <input class="form-control" name="Donor_Number" placeholder="<?php echo $Donor_Number ?>" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>National Number</label>
                                                    <input class="form-control" placeholder="<?php echo $national ?>" name="national" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Donation Date</label>
                                                    <input class="form-control" placeholder="<?php echo $Donation_Date ?>" name="Donation_Date" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <input class="form-control" placeholder="<?php echo $Blood_Group ?>" name="Blood_Group" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount Blood</label>
                                                    <input class="form-control" placeholder="<?php echo $Amount_Blood ?>" name="Amount_Blood" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Picking Type</label>
                                                    <input class="form-control" placeholder="<?php echo $Picking_Type ?>" name="Picking_Type" required disabled>
                                                </div>
                                                
                                                
                                              
    
                                                <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%"> <a href="uploadPrint.php?Donation_Number=<?php echo $row['Donation_Number'] ?>" style="color:white;">Print QR Code</a></button>
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