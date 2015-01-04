<?php
require_once 'lib/config.php';
require_once 'lib/class/fetch.class.php';
$sql = "SELECT * FROM `cw_server`";
$query = $dbc->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $site_name; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <?php echo $site_name; ?>
                    </a>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><?php echo $site_name; ?></h1>
                        <p>这是<?php echo $site_name; ?>的监控页面，联系邮箱 <code>#mail@msn.com</code>.</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Server</th>
                            <th>Load</th>
                            <th>Uptime</th>
                            <th>Traffic</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ( $rs = $query->fetch_array()){
                                $o = new fetch($rs['server_api_add']);
                                $a = $o->get_array();
                        ?>
                        <tr>
                            <td>#</td>
                            <td><?php echo $rs['server_name']; ?></td>
                            <td><?php echo $o->get_load()['0'].$o->get_load()['1'].$o->get_load()['2']; ?></td>
                            <td><?php echo $o->get_uptime(); ?></td>
                            <td>今日:<?php echo $o->get_traffic_day(); ?>本月:<?php echo $o->get_traffic_month(); ?>总流量:<?php echo $o->get_traffic_total(); ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
          
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
