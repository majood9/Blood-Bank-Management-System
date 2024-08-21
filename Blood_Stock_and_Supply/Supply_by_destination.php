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
    <style>
        /* table {
            
        } */
        th {
            background-color: #98b8d4;
            text-align: center;
            color: white;
            font-size: 15px;
        }


        th.hh {
            background-color: white;
            text-align: center;
            border: none;
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
    <style>
        #dataTables-example th:nth-child(1),
        #dataTables-example td:nth-child(1) {
            text-align: center;
        }
    </style>
    <style>
        #dataTables-example th,
        #dataTables-example td {
            text-align: center;
        }
    </style>


</head>

<body>



    <div id="wrapper">


        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                        <h1 class="page-header" style="color: #98b8d4; margin: 0; margin-left: auto; margin-right: auto;">Supply By Destination</h1>
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
                                    <form role="form" action="View_Supply_by_destination.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly>
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">الممول<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Financier" ; type="text" ; value="BLOOD BANK" readonly><br><br>

                                            </input>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="font-size:15px;margin-right:30px;flex: 1; padding: 7px;">تاريخ ملحوظة التوريد</label>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">من<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="From" ; type="Date" ; value="<?php echo date('Y-m-d'); ?> " required><br><br>

                                            </input>
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">إلى<span style="color: red;">*</span></label>
                                            <input style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="To" ; type="Date" ; value="<?php echo date('Y-m-d'); ?> " required><br><br>

                                            </input>
                                        </div><br>
                                        <br>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">المنشأة الطالبة<span style="color: red;"></span></label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Requesting_Party" ; type="text" ><br><br>
                                                <option value="Total">الكل</option>
                                                <option value="Damascus Hospital" name="O1"><span>مشفى دمشق (المجتهد)</span></option>
                                                <option value="Children َs Hospital" name="O2">مشفى الاطفال</option>
                                                <option value="Mouwasat Hospital" name="O3"><span>مشفى الموساة</span></option>
                                                <option value="AL-Assad University Hospital" name="O4"><span>مشفى الأسد الجامعي</span></option>
                                                <option value="AL-Rashid Hospital" name="O5"><span>مشفى الرشيد</span></option>
                                                <option value="Ibn AL-Nafis Hospital" name="O6"><span>مشفى ابن النفيس</span></option>
                                                <option value="AL-Fayhaa Hospital" name="O7"><span>مشفى الفيحاء</span></option>


                                            </select>
                                        </div><br>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">مكون الدم</label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Unit_Type" ; type="text"><br><br>
                                                <option value="Total">الكل</option>
                                                <option value="RBC"><span>RED BLOOD CELLS</span></option>
                                                <option value="FFP"><span>FRESH FROZEN PLASMA</span></option>
                                                <option value="PU">PLATELET UNIT</option>
                                                <option value="WB">WHOLE BLOOD</option>
                                            </select>
                                        </div><br>


                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:30px;flex: 1; padding: 7px;">الأولوية</label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Priority" ; type="text"><br><br>
                                                <option value="Total">الكل</option>
                                                <option value="Urgent"><span>عاجل</span></option>
                                                <option value="Not Urgent"><span>غير عاجل</span></option>
                                            </select>
                                        </div><br>
                                        <br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:33px;flex: 1; padding: 7px;">عرض<span style="color: red;">*</span></label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Display" ; type="text"><br><br>
                                                <option value=""></option>
                                                <option value="فصائل الدم"><span>فصائل الدم</span></option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="margin-right:33px;flex: 1; padding: 7px;">بحث<span style="color: red;">*</span></label>
                                            <select style="text-align:center;margin-left:370px;width:300px; color:blue;" class="form-control" ; name="Search" ; type="text"><br><br>
                                                <option value=""></option>
                                                <option value="Supplied Units"><span>كل الوحدات الموردة</span></option>
                                                <option value="Incoming Units"><span>كل الوحدات الواردة</span></option>
                                            </select>
                                        </div><br>

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