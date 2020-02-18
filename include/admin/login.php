<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS -->
    <link href="../../asset/css/compiled.min.css" rel="stylesheet" type="text/css">
</head>
<body class="fixed-sn white-skin">
    <div class="view hm-black-strong">
        <img src="../../asset/img/hotel/frontdesk.jpg" style="background-size: cover;background-position:center;width: 100%;height: 648px">
        <div class="mask">
            <div class="container" style="margin-top:3%;" align="center">
                <img src="../../asset/img/hotel/logoreal2.png" style="margin-bottom: 2% ">

                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-lg-12" align="center">
                        <div class="card" style="width: 50%;">
                            <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist" style="margin-bottom: 1%;">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-key mr-1"></i>Admin</a>
                                </li>
                            </ul>
                            <!-- Tab panels -->
                            <div class="tab-content">
                                <!--Panel 8-->
                                <div class="tab-pane fade  in show active" id="panel8" role="tabpanel">
                                    <!--Body-->
                                    <form action="php/set_to_admin.php" method="post">
                                        <div class="md-form form-sm" align="left">
                                            <i class="fa fa-envelope prefix"></i>
                                            <input type="text" name="username" class="form-control">
                                            <label for="form24">Username</label>
                                        </div>

                                        <div class="md-form form-sm" align="left">
                                            <i class="fa fa-lock prefix"></i>
                                            <input type="password" name="password" class="form-control">
                                            <label for="form25">Password</label>
                                        </div>
                                        <div class="text-center form-sm mt-2">
                                            <button class="btn btn-info" name="admin" type="submit">Login <i class="fa fa-sign-in ml-1"></i></button>
                                        </div>
                                    </form>
                                    <!--/.Panel 8-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
    <script>
        $(".button-collapse").sideNav();
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
    </script>
</body>
</html>
