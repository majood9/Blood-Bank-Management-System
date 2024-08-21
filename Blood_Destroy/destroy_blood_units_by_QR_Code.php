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
        transform: scale(1.6); /* زيادة حجم العلامة بنسبة معينة */
        margin-right: 5px; /* تحديد المسافة بين العلامة والنص */
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
        margin-bottom: 20px; /* زيادة المسافة بين الفورمات */
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
                fetch('destroy_blood_units.php?qrData=')
                    .then(response => response.text())
                    .then(data => {
                        window.location.href = "destroy_blood_units.php?qrData=" + content;
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
                        <h1 class="page-header" style="color: #777; margin: 0; margin-left: auto; margin-right: auto;">Destroy Blood Units</h1>
                        <form action="user2dashboard.php" method="post" style="margin: 0;">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; border-radius: 20px; background-color: #777; color: white; padding: 5px 15px; border: none; text-transform: uppercase; font-weight: bold;">
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
                                    <form role="form" action="addtest.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly>
                                        </div><br>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;margin-right:35px;">تاريخ الإتلاف</label>
                                            <input style="text-align: center; color:darkred;flex: 1; margin-left: 465px;" class="form-control" name="date_view"; type="text"; value="<?php echo date('Y-m-d'); ?> "readonly><br><br>
                                        </div><br>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">السبب ١<span style="color: red;"> *</span></label> 
                                            <select placeholder="سبب الإتلاف"  style="text-align: center;flex: 1; margin-left: 503px; color:darkred;" class="form-control"; name="national"; type="text"  required><br><br>
                                                  <option value=""></option>
                                                 
                                                  <option value="إنتهاء في الصلاحية"><span>إنتهاء في الصلاحية</span></option>
                                                  <option value="سوء في التخزين"><span>سوء في التخزين</span></option>
                                                  
                                                  
                                            </select>
                                        </div><br>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">السبب ٢</label> 
                                            <input placeholder="سبب الإتلاف"  style="text-align: center;flex: 1; margin-left: 465px; color:darkred;" class="form-control"; name="national"; type="text"  required><br><br>
                                              
                                            </input>
                                        </div><br>
                                       
 
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">كود الوحدة <span style="color: red;">*</span></label> 
                                            <input placeholder="كود الوحدة"  style="text-align: center;flex: 1; margin-left: 465px; color:darkred;" class="form-control"; name="national"; type="text"  required><br><br>
                                              
                                            </input>
                                        </div><br>
                                       
                                      
                                       
      
                                                                              

                                        

                                       
                                      

 


                                        

                                        <div id="line">
    <hr><br>

    
                                        
                                        
</div><br>
                                          
       

                                         
                                            

                                           
                                            
                                          
                         
                                     
                                        </div>
                                        
                                       									<table class="table table-striped table-bordered table-hover" id="dataTables-example">


<thead>
						<tr style="background-color:#777;" >
							<th style="text-align:center;color: white;">تاريخ الصلاحية</th>
							<th style="text-align:center;color: white;">الكمية</th>
							
                            <th style="text-align:center;color: white;">زمرة الدم</th>
                       
                            <th style="text-align:center;color: white;">رقم الوحدة</th>



						</tr>
						</thead>
                        <tbody>
                         <tr style="text-align:center;color:darkred;">
						  <td></td>
						  <td></td>
						  <td></td>
                          <td></td>
                      

						</tr><tbody>
                        						</table><br>



                        <div style="display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-primary" style="border-radius: 7px; margin-top: 100px; background-color: #777; color: white; padding: 8px 100px; border: none; font-size: 16px;">
                                 إدخال
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





</html>