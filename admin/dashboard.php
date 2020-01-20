<?php
session_start();
require __DIR__ . '/lib/library.php';
require __DIR__ . '/helpers/helper.php';
isNotLogin();
$app = new SunriseClick();
$name = $_SESSION['name'];
$homedetails = $app->getHomePageDetails();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> SunriseClick | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!--sweetalert-->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                        <h1>Dashboard Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                            <li class="breadcrumb-item active">Dashboard Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">HomePage Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="ajax/updateHomePageDetails.php" id="updateHomePageDetail" method="post">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="heading1">Heading1</label>
                                        <input type="text" name="heading1" value="<?= $homedetails->heading1 ?>" class="form-control" id="heading1" placeholder="Enter Heading1" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="heading2">Heading2</label>
                                        <input type="text" name="heading2" value="<?= $homedetails->heading2 ?>" class="form-control" id="heading2" placeholder="Enter Heading2" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="ctime">CountDown Time(Year, Month,Date, Min, Hour, Sec)</label>
                                        <input type="number" name="year" value="<?= $homedetails->count_year ?>" class="form-control"  placeholder="Year Ex: 2020" required>
                                        <input type="number" name="month" value="<?= $homedetails->count_month ?>" class="form-control"  placeholder="Month Ex: 11" required>
                                        <input type="number" name="date" value="<?= $homedetails->count_date ?>" class="form-control"  placeholder="Date Ex: 11" required>
                                        <input type="number" name="hours" value="<?= $homedetails->count_hours ?>" class="form-control"  placeholder="Hours Ex: 10" required>
                                        <input type="number" name="minutes" value="<?= $homedetails->count_minutes ?>" class="form-control"  placeholder="Minutes Ex: 10" required>
                                        <input type="number" name="seconds" value="<?= $homedetails->count_seconds ?>" class="form-control"  placeholder="Seconds Ex: 10" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="fb_url">Facebook Page URL</label>
                                        <input type="url" name="fb_url" value="<?= $homedetails->fb_url ?>" class="form-control" id="fb_url" placeholder="Facebook URL">
                                    </div>

                                    <div class="form-group">
                                        <label for="ytb_url">Youtube URL</label>
                                        <input type="text" name="ytb_url" value="<?= $homedetails->ytb_url ?>" class="form-control" id="ytb_url" placeholder="Youtube URL" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="twt_url">Twitter URL</label>
                                        <input type="text" name="twt_url" value="<?= $homedetails->twt_url ?>" class="form-control" id="twt_url" placeholder="Twitter URL" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">
                        <!-- general form elements disabled -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Contact-Us Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post" action="ajax/updateContactUsDetails.php" id="updateContactUsDetails">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?= $homedetails->email ?>" class="form-control" id="email" placeholder="Enter Email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" value="<?= $homedetails->phone ?>" class="form-control" id="phone" placeholder="Enter Phone Number" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="work_time">Working Time</label>
                                        <input type="text" name="working_time" value="<?= $homedetails->working_time ?>" class="form-control" id="work_time" placeholder="Working Time" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="work_days">Working Days</label>
                                        <input type="text" name="working_days" value="<?= $homedetails->working_days ?>" class="form-control" id="work_days" placeholder="Working Days" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="off_days">Off Days</label>
                                        <input type="text" name="off_days" value="<?= $homedetails->off_days ?>" class="form-control" id="off_days" placeholder="Off Days" required>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--sweetalert2-->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- SunriseClick App -->
<script src="assets/js/sunriseclick.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    $("#updateHomePageDetail").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var res = $.parseJSON(data);
                if(res.status){
                    Toast.fire({
                        type: 'success',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                }
            }
        });
    });

    $("#updateContactUsDetails").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var res = $.parseJSON(data);
                if(res.status){
                    Toast.fire({
                        type: 'success',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                }
            }
        });
    });
</script>
</body>
</html>
