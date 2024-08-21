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




<body>



    <div id="wrapper">


        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class=".col-lg-12">



                        <h1 class="page-header">Bloods Separation Detail</h1>

                    </div>
                </div>



                <div class="row">

                    <div class=".col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Total Records of available Bloods Separation


                                <form action="View_Blood_Separation.php" method="" style="display:inline;">
                                    <!-- <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
										<label style="flex: 1;margin-right: 605px; padding: 7px;">سبب التبرع</label>
										<select style="text-align: center;flex: 4; " class="form-control" name="donation_reason" >
											<option value=""></option>

											 <option value="Total">Total</option> 
											<option value="Patients">مرضي</option>
											<option value="Voluntary">متطوع</option>
											<option value="substitute">بديل</option>

										</select>
										
										

									</div> -->

                                    <div class="input-group mb-3" style="margin-left:75%; margin-top:-22px; display: flex;">
                                        <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>" class="form-control" placeholder="Search data">
                                        <button style="margin-left:-2px;" type="submit" class="btn btn-primary">Search</button>


                                    </div>
                                </form>
                            </div>


                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                        <?php

                                        include "dbconnect.php";




                                        echo "
						<thead>
						<tr>
							
							<th>Unit Number</th>
							<th>Donation Number</th>
							<th>Test Number</th>
							<th>Separation Date</th>
							<th>Picking Type </th>
							<th>Unit Type</th>
							<th>Unit Amount</th>
							<th>QR Code</th>


						</tr>
						</thead>";
                                        if (isset($_GET['search'])) {


                                            $filtervalues = 'SE' . $_GET['search'];
                                            $d = date('Y-m-d');
                                            $qry = "SELECT * FROM Blood_Separation WHERE Unit_Type='WB' and Separation_Date = '$d' and CONCAT(Unit_Number) LIKE '$filtervalues%' ";
                                            $result = mysqli_query($conn, $qry);


                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Unit_Number'] . "</td>
                                      
                                                <td>" . $row['Donation_Number'] . "</td>
                                                <td>" . $row['Test_Number'] . "</td>
                                                <td>" . $row['Separation_Date'] . "</td>
                                                <td>" . $row['Picking_Type'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Unit_Amount'] . "</td>
                                                <td>" . '<a href="uploadPrint.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                            }
                                        } else {
                                            $d = date('Y-m-d');







                                            $qry = "select * from Blood_Separation where Unit_Type='WB' and Separation_Date = '$d'  ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Unit_Number'] . "</td>
                                      
                                                <td>" . $row['Donation_Number'] . "</td>
                                                <td>" . $row['Test_Number'] . "</td>
                                                <td>" . $row['Separation_Date'] . "</td>
                                                <td>" . $row['Picking_Type'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Unit_Amount'] . "</td>
                                                <td>" . '<a href="uploadPrint.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                            }
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