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
                        <h1 class="page-header">Donor's Detail</h1>
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
                                        

                                        $id = $_GET['national'];
                                        // $date_view = $_GET['date_view'];




                                        $qry = "select  * from donor, status where status.national=$id and donor.national=$id and status.date_view= (SELECT MAX(date_view) FROM status where status.national=$id);  ";
                                        $result = mysqli_query($conn, $qry);
    
    
    
    
    
    
    
                                        while ($row = mysqli_fetch_array($result)) {
                                            $Donation_code = $row["Donation_code"];
                                            $name = $row["name"];
                                            $name_father = $row["name_father"];
                                            $name_mother = $row["name_mother"];
                                            $name_family = $row["name_family"];
                                            $national = $row["national"];
                                            $address = $row["address"];
                                            $dob = $row["dob"];
                                            $gender = $row["gender"];
                                            $age = $row["age"];
                                            $date_view = $row["date_view"];
                                            $donation_reason = $row["donation_reason"];
                                            $phone_number = $row["phone_number"];
    
    
    
                                        ?>
                                            <form role="form" action="#" method="post" >
                                                <?php echo ' <img style="width:250px; height:250px; margin-left:70%;" src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code"> ' ?>
                                                <!-- أجزاء نموذج إضافة تفاصيل المتبرع -->
                                                <div class="form-group">
                                                    <label>National Number</label>
                                                    <input class="form-control" placeholder="<?php echo $national ?>" name="national" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Donation_code</label>
                                                    <input class="form-control" name="Donation_code" placeholder="<?php echo $Donation_code ?>" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" placeholder="<?php echo $name ?>" name="name" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name_Father</label>
                                                    <input class="form-control" placeholder="<?php echo $name_father ?>" name="name_father" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name_Mother</label>
                                                    <input class="form-control" placeholder="<?php echo $name_mother ?>" name="name_mother" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name_Family</label>
                                                    <input class="form-control" placeholder="<?php echo $name_family ?>" name="name_family" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" placeholder="<?php echo $address ?>" name="address" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender [ M/F ]</label>
                                                    <input class="form-control" placeholder="<?php echo $gender ?>" name="gender" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>D.O.B</label>
                                                    <input class="form-control" placeholder="<?php echo $dob ?>" name="dob" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input class="form-control" placeholder="<?php echo $age ?>" name="age" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date_View</label>
                                                    <input class="form-control" placeholder="<?php echo $date_view ?>" name="date_view" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Donation_Reason</label>
                                                    <input class="form-control" placeholder="<?php echo $donation_reason ?>" name="donation_reason" required disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone_Number</label>
                                                    <input class="form-control" placeholder="<?php echo $phone_number ?>" name="phone_number" required disabled>
                                                </div>
                                              
    
                                                <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%"> <a href="uploadPrint.php?national=  <?php echo $row['national'] ?>" style="color:white;">Print QR Code</a></button>
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