<html>

<head>


    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


</head>


<body>
    <div id="wrapper">

        <?php include 'includes/nav.php' ?>


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class=".col-lg-12">
                        <h1 class="page-header">Blood Collection</h1>
                    </div>
                </div>

                <div class="row">
                    <div class=".col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Total Records of available bloods
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->

                                    <?php

                                    include "dbconnect.php";

                                    // if (isset($_GET['qrData'])) {
                                    $qrData = $_GET['qrData'];

                                    // قم بتفكيك بيانات QR code إلى مصفوفة
                                    $data = explode(":", $qrData);

                                    $Id = $data[5];
                                    $bloodGroup = $data[1];
                                    $bloodQuantity = $data[2];
                                    $collectionDate = $data[3];

                                    // قم بتخزين البيانات في جلسة
                                    //     session_start();
                                    //     $_SESSION['bloodId'] = $bloodId;
                                    //     $_SESSION['bloodGroup'] = $bloodGroup;
                                    //     $_SESSION['bloodQuantity'] = $bloodQuantity;
                                    //     $_SESSION['collectionDate'] = $collectionDate;

                                    //     // قم بإعادة توجيه المستخدم إلى صفحة "display.php"
                                    //     header("Location: display.php");
                                    //     exit;
                                    // } else {
                                    //     echo "No QR data provided";
                                    // }


                                    $qry = "select * from donor,status where donor.national=status.national and  donor.national=$Id ";
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
                                        <form role="form" action="#" method="post">
                                            <?php echo ' <img style="width:250px; height:250px; margin-left:40%" src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code"> ' ?>
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
                                          

                                            <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:45%"> <a href="uploadPrint.php?national=  <?php echo $row['national'] ?>" style="color:white;">Print QR Code</a></button>
                                            <!-- <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;>Print QR Code</button> -->
                                        </form>

                                    <?php } ?>
                                    <!-- </table> -->

                                </div>
                            </div>
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

    <!-- DataTables JavaScript -->
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

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