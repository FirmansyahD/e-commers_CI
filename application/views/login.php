<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin</title>
    <style>

</style>

    <!-- Favicon-->
    <link rel="icon" href="<?=base_url()?>/assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?=base_url()?>/assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url()?>/assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="login-page">
<img src="<?=base_url()?>/assets/images/background-hd-2.jpg" style="width: 120%;
     height: 120%;
    margin-left:-20px;
     position: fixed;
    margin-top:-150px;
     float: left;
     left: 0;"alt="gambar"  />
    <div class="login-box">
	<div class="card1"style="margin-top:150px">
		<div class="ok">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
		</div>
	</div>
        <div class="card bg-white">
            <div class="body">
                <form id="form_login" method="POST" action="<?=base_url(); ?>index.php/user/Login">
                <div class="logo">
                        <a href="javascript:void(0);"><img src="<?=base_url()?>/assets/gambar/apple.png"width="20%"class="margin-left:20px" alt=""> <span> </span></a>
                        
                    </div>
                    <div class="msg"> </div>
                    <p id="error" style="color:grey"></p>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text"style="padding-left:6px" class="form-control" name="Username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password"style="padding-left:6px" class="form-control" name="Password" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <input class="btn btn-block bg-cyan waves-effect" type="submit" id="masuk" name="masuk" value="MASUK">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?=base_url()?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=base_url()?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>assets/js/admin.js"></script>
    <script src="<?=base_url()?>assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?=base_url()?>assets/js/demo.js"></script>
</body>

</html>
