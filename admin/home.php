<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Portofolio</title>

        <!-- icon -->
        <link rel="icon" type="image/png" href="../bootstrap/images/s.png"/>

        <!-- Bootstrap Core CSS -->
        <link href="../bootstrap/scss/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bootstrap/scss/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../bootstrap/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../bootstrap/css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../bootstrap/scss/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../bootstrap/scss/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../bootstrap/scss/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bootstrap/scss/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">Admin Portofolio</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php 
                        include("../koneksi.php");
                        $query=mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$_GET[username]'");
                        $data=mysqli_fetch_array($query);                        
                        ?>
                            <i class="fa fa-user fa-fw"></i> <?php echo $data['nama']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a <?php if ($_GET["page"]=="home"){echo 'class="active"'; }?> href="?page=home&username=<?php echo $_GET['username']?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="kategori"){echo 'class="active"'; }?> href="?page=kategori&username=<?php echo $_GET['username']?>"><i class="fa fa-bookmark fa-fw"></i> Kategori </a>
                            </li>

                            <li>
                                <a <?php if ($_GET["page"]=="project"){echo 'class="active"'; }?> href="?page=project&username=<?php echo $_GET['username']?>"><i class="fa fa-file-archive-o fa-fw"></i> Project </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- /.row -->
                    <!-- kontent -->
                    <?php
                    include_once "main.php";
                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../bootstrap/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bootstrap/js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../bootstrap/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../bootstrap/js/raphael.min.js"></script>
        <script src="../bootstrap/js/morris.min.js"></script>
        <script src="../bootstrap/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../bootstrap/js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

<script>
 $(function() { 
   $('#tgl1').datetimepicker({format : "DD-MM-YYYY"});
   $('#tgl2').datetimepicker({format : "DD/MMM/YYYY"});
   $('#tgl3').datetimepicker({format : "DD/MMMM/YYYY"});
 });
</script>

    </body>
</html>
