<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>
    <style>
        #myCheckbox {
            transform: scale(1.6);
            /* زيادة حجم العلامة بنسبة معينة */
            margin-right: 5px;
            /* تحديد المسافة بين العلامة والنص */
        }
    </style>


    <style>
        .form-control[name="date_view"] {
            border: none;
        }

        .form-control[name="Donation code"] {
            border: none;
        }

        input:out-of-range {
            border: 2px solid red;
        }

        .error-message {
            color: red;
            display: none;
            /* جعل رسالة الخطأ غير مرئية ابتدائياً */
        }

        .out-of-range:focus+.error-message {
            display: block;
        }

        .btn-primary {
            transition: all 0.3s ease;

        }

        .btn-primary:hover {
            transform: scale(1.1);
        }
    </style>





    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .form-group {
            margin-bottom: 20px;
            /* زيادة المسافة بين الفورمات */
        }
    </style>


</head>

<body>



    <div id="wrapper">


        <?php include 'includes/nav.php' ?>

        <video id="qr-video" style="display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        margin-right: -50px;
        margin-top: -13px; " width="0px" height="0px" type="hidden" hidden></video>
        <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('qr-video')
            });
            scanner.addListener('scan', function(content) {
                fetch('Supplying_blood_units.php?qrData=')
                    .then(response => response.text())
                    .then(data => {
                        window.location.href = "Supplying_blood_units.php?qrData=" + content;
                    });
            });
            Instascan.Camera.getCameras().then(cameras => {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            });
        </script>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                        <h1 class="page-header" style="color: #98b8d4; margin: 0; margin-left: auto; margin-right: auto;">Supplying Blood Units</h1>
                        <form action="user2dashboard.php" method="post" style="margin: 0;">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; border-radius: 20px; background-color: #98b8d4; color: white; padding: 5px 15px; border: none; text-transform: uppercase; font-weight: bold;">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </form>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">



                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="Supplying_blood_units.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">المنشأة الطالبة<span style="color: red;">*</span></label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="national" ; type="text" required><br><br>
                                                <option value=""></option>
                                                <option value="مشفى دمشق (المجتهد)"><span>مشفى دمشق (المجتهد)</span></option>
                                                <option value="مشفى الاطفال">مشفى الاطفال</option>
                                                <option value="مشفى الموساة"><span>مشفى الموساة</span></option>
                                                <option value="مشفى الأسد الجامعي"><span>مشفى الأسد الجامعي</span></option>
                                                <option value="مشفى الرشيد"><span>مشفى الرشيد</span></option>
                                                <option value="مشفى ابن النفيس"><span>مشفى ابن النفيس</span></option>
                                                <option value="مشفى الفيحاء"><span>مشفى الفيحاء</span></option>


                                            </select>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">الممول<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="national" ; type="text" ; value="BLOOD BANK SYSTEM" readonly><br><br>

                                            </input>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">تاريخ الطلب<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="national" ; type="Date" ; value="<?php echo date('Y-m-d'); ?> "><br><br>

                                            </input>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">الأولوية</label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="national" ; type="text"><br><br>
                                                <option value=""></option>
                                                <option value="عاجل"><span>عاجل</span></option>
                                                <option value="غير عاجل"><span>غير عاجل</span></option>
                                            </select>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;"> أسم المستلم<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="national" ; type="text" required><br><br>

                                            </input>
                                        </div><br>













                                        <div id="line">
                                            <hr><br>


                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;margin-right:35px;">كود الوحدة</label>
                                                <input placeholder="كود الوحدة" style="text-align: center;flex: 1; margin-left: 465px; color:blue;" class="form-control" ; name="national" ; type="text" required><br><br>

                                                </input>
                                            </div>
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;margin-right:35px;">مكون الدم </label>
                                                <input placeholder="مكون الدم" style="text-align: center;flex: 1; margin-left: 465px; color:blue;" class="form-control" ; name="national" ; type="text" required><br><br>

                                                </input>
                                            </div>
                                        </div><br>











                                </div>

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">


                                    <thead>
                                        <tr style="background-color:#98b8d4;">
                                            <th style="text-align:center;color: white;">تاريخ الصلاحية</th>
                                            <th style="text-align:center;color: white;">زمرة الدم</th>
                                            <th style="text-align:center;color: white;">مكون الدم</th>
                                            <th style="text-align:center;color: white;">كود الوحدة</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:center;color:blue;">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    <tbody>
                                </table>



                                <div style="display: flex; justify-content: center;">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 7px; margin-top: 30px; background-color: #98b8d4; color: white; padding: 8px 100px; border: none; font-size: 16px;">
                                        تنفيذ الطلب
                                    </button>
                                </div>




                                </form>






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