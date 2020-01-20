<?php
session_start();
require __DIR__ . '/lib/library.php';
require __DIR__ . '/helpers/helper.php';
isNotLogin();
$app = new SunriseClick();
$name = $_SESSION['name'];
$subscribers = $app->getAllSubscribers();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> SunriseClick | Subscribers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!--datatable-->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/sunriseclick.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php
    require __DIR__ . '\layouts\header.php';
    require __DIR__ . '\layouts\sidebar.php';
    ?>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subscribers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Subscribers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="subscribers-data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>CreatedAt</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($subscribers): ?>
                                <?php foreach($subscribers as $value): ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td><?php echo $value->created_at; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>CreatedAt</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

    </div>
</div>


<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--Datatable-->
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- SunriseClick App -->
<script src="assets/js/sunriseclick.js"></script>
<script>
    $(function () {
        $('#subscribers-data').DataTable();
    });
</script>
</body>
</html>
