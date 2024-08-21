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


        <?php include 'includes/Doctor_nav.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class=".col-lg-12">



                        <h1 class="page-header">Tests Details</h1>

                    </div>
                </div>



                <div class="row">

                    <div class=".col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Total Records of available Tests


                                <form action="view_test.php" method="" style="display:inline;">
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
							

							<th>The National Number</th>
							<th>Name</th>
                            <th>Date_View</th>
							<th>Medication</th>
							<th>Eligible</th>
                            <th>Blood_Group</th>
                            <th>Picking_Type</th>
							<th>Low_Pressure</th>
							<th>High_Pressure</th>
							<th>Pulse</th>
							<th>Pulse_Rate</th>
							<th>Hemoglobin</th>
							<th>Weight</th>
							<th>Temperature</th>
							<th>Note</th>
							<th>Status</th>
							<th>First_Reason</th>
							<th>Second_Reason</th>
							<th>QR Code</th>



						</tr>
						</thead>";
                                        if (isset($_GET['search'])) {


                                            $filtervalues = $_GET['search'];
                                            $qry = "SELECT * FROM donor,Test WHERE Test.national_id=donor.national and CONCAT(donor.name) LIKE '$filtervalues%' ";
                                            $result = mysqli_query($conn, $qry);


                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tbody>
		  <tr>
		  		  <td>" . $row['national_id'] . "</td>
		  		  <td>" . $row['name'] . "</td>

		  <td>" . $row['date_view'] . "</td>
		  <td>" . $row['medication'] . "</td>
		  <td>" . $row['eligible'] . "</td>
		  <td>" . $row['Blood_Group'] . "</td>
		  <td>" . $row['Picking_Type'] . "</td>
		  <td>" . $row['low_pressure'] . "</td>
		  <td>" . $row['high_pressure'] . "</td>
		  <td>" . $row['pulse'] . "</td>
		  <td>" . $row['pulse_rate'] . "</td>
		  <td>" . $row['hemoglobin'] . "</td>
		  <td>" . $row['weight'] . "</td>
		  <td>" . $row['temperature'] . "</td>
		  <td>" . $row['note'] . "</td>
		  <td>" . $row['status'] . "</td>
		  <td>" . $row['first_reason'] . "</td>
		  <td>" . $row['second_reason'] . "</td>
		  <td>" . '<a href="uploadPrint.php?national=' . $row['national'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>


		</tr>
		<tbody>
		";
                                            }
                                        } else {







                                            $qry = "SELECT * FROM donor,Test WHERE Test.national_id=donor.national  ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tbody>
		  <tr>
		  		  <td>" . $row['national_id'] . "</td>
		  		  <td>" . $row['name'] . "</td>

		  <td>" . $row['date_view'] . "</td>
		  <td>" . $row['medication'] . "</td>
		  <td>" . $row['eligible'] . "</td>
		  <td>" . $row['Blood_Group'] . "</td>
		  <td>" . $row['Picking_Type'] . "</td>
		  <td>" . $row['low_pressure'] . "</td>
		  <td>" . $row['high_pressure'] . "</td>
		  <td>" . $row['pulse'] . "</td>
		  <td>" . $row['pulse_rate'] . "</td>
		  <td>" . $row['hemoglobin'] . "</td>
		  <td>" . $row['weight'] . "</td>
		  <td>" . $row['temperature'] . "</td>
		  <td>" . $row['note'] . "</td>
		  <td>" . $row['status'] . "</td>
		  <td>" . $row['first_reason'] . "</td>
		  <td>" . $row['second_reason'] . "</td>
		  <td>" . '<a href="uploadPrint.php?national=' . $row['national'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>


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