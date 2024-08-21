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
                        <h1 class="page-header">Add Donor's Detail</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Please fill up the form below:
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="added.php" method="post">
                                            <!-- أجزاء نموذج إضافة تفاصيل المتبرع -->
                                            <div class="form-group">
                                                <label>Enter The National Number</label>
                                                <input class="form-control" type="number" placeholder="National Number" name="national" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Full Name</label>
                                                <input class="form-control" name="name" type="text" placeholder="Example: Harry Den" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Guardian's Name</label>
                                                <input class="form-control" placeholder="Guardian's Name" name="guardiansname" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender [ M/F ]</label>
                                                <input class="form-control" placeholder="M or F" name="gender" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter D.O.B</label>
                                                <input class="form-control" type="date" name="dob" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Weight</label>
                                                <input class="form-control" type="number" placeholder="Enter Weight" name="weight" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Blood Group</label>
                                                <input class="form-control" placeholder="Eg: B+" name="bloodgroup" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Address</label>
                                                <input class="form-control" type="text" placeholder="Enter Address Here" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Contact Number</label>
                                                <input class="form-control" type="number" placeholder="Contact Number" name="contact" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Collection Date</label>
                                                <input class="form-control" type="date" name="collection" required>
                                            </div>
                                            <div class="form-group">
                                                <label>The Required Group</label>
                                                <input class="form-control" placeholder="Eg: AB" name="required">
                                            </div>
                                            <div class="form-group">
                                                <label>The Requesting Party</label>
                                                <input class="form-control" name="party" type="text" placeholder="Exam: Al-Hayat Hospital">
                                            </div>


                                            <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%" ;>Submit Form</button>
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