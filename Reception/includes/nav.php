

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div style="position:fixed; height:50px; width: 100%;  background-color: #f8f8f8; border-bottom: 1px solid #ddd; z-index: 1010; " >

<div class="navbar-header" style="position: fixed ; z-index:1000;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><i class="icofont-blood-drop" style='color:rgba(220, 20, 60, 0.8)'></i>Blood Bank Management System</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right" style="position: fixed ; right:0;  z-index:1000;">


        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> <i class="fa fa-caret-down" style='color:rgba(220, 20, 60, 0.8)'></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!-- <li class="divider"></li> -->
                <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw" style='color:darkred'></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>

        <!-- /.dropdown -->
    </ul>

    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                
             <li>
                    <a href="userdashboard.php" style='color:darkred'><i class="fa icofont-dashboard-web fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> Dashboard</a>
                </li>
                <li>
                    <a href="Add_Donor_By_QR_Code.php" style='color:darkred'><i class="fa fa-table fa-user-plus fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> Add Donor </a>

                    <!-- /.nav-second-level -->
                </li>


                <li>
                <a href="viewdonor.php" style='color:darkred'><i class="fa  fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Donor Details <i style="font-size: larger; margin-right: 50px;" class="fa fa-arrow-right arrow "></i></span> </a>

                    <ul class="nav" id="side-menu" style="margin-left:12px;">
                        <li >
                                                <a href="viewdonor.php" style='color:darkred'><i class="fa fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Total Donor Details </a>

                        </li>
                        <li>
                                                <a href="view_today_donor.php" style='color:darkred'><i class="fa fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Today Donor Details </a>

                        </li>
                        <li>
                                                <a href="view_patients_donor.php" style='color:darkred'><i class="fa fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Patients Donor Details </a>

                        </li>
                        <li>
                                                <a href="view_voluntary_donor.php" style='color:darkred'><i class="fa fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Voluntary Donor Details </a>

                        </li>
                        <li>
                                                <a href="view_substitute_donor.php" style='color:darkred'><i class="fa fa-eye fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Substitute Donor Details </a>

                        </li>
                    </ul>

                </li>

                <li>
                    <a href="Edit_Donor.php" style='color:darkred'><i class="fa fa-edit fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> Edit Donor Details </a>

                </li>
                <li>
                    <a href="Print_Details_Donor.php" style='color:darkred'><i class="fa   fa-print fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> Print Details Donor</a>
                </li>
                <li>
                    <a href="View Statistics.php" style='color:darkred'><i class="fa fa-bar-chart fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> View Statistics</a>
                </li>
                <li>
                    <a href="Card_Blansh.php" style='color:darkred'><i class="fa fa-star-half-full fa-fw" style='color:rgba(220, 20, 60, 0.8)'></i> Distinguished Donors</a>
                </li>




            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>