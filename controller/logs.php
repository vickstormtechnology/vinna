<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="assets/img/logo/favicon.png" type="image/x-icon" />
    <title>Vinna (Bot) | Dashboard</title>
    <link rel="apple-touch-icon" href="assets/img/logo/favicon.png" />

    <link rel="stylesheet" href="assets/css/siqtheme.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard1.css">
</head>

<body class="theme-dark">
    <div class="grid-wrappe sidebar-bg bg1">

        <!-- BOF HEADER -->
        <div class="header">
            <div class="header-bar">
                <div class="brand">
                    <a href="#" class="logo">
                        <img class="img-fluid logo-img" style="width: 200px;" src="assets/img/logo/logo.png" alt="logo" />
                    </a>
                    <a href="#" class="logo-sm text-carolina" style="display: none;">Vinna (BOT)</a>
                </div>
                <div class="btn-toggle">
                    <!-- <a href="#" class="toggle-sidebar-btn"><i class="ti-arrow-circle-left"></i></a> -->
                    <a href="#" class="slide-sidebar-btn" style="display: none;"><i class="ti-menu"></i></a>
                </div>
                <div class="navigation d-flex">

                    <!-- BOF Header Nav -->
                    <div class="navbar-menu d-flex">
                        <div class="menu-item">
                            <a href="init-bot.php" class="btn">
                               Home
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="logs.php" class="btn" >
                                Logs
                            </a>
                        </div>
                        <div class="menu-item"></div>
                        <div class="menu-item"></div>
                    </div>
                    <!-- EOF Header Nav -->

                </div>
            </div>
        </div>

        <!-- EOF MAIN -->
        <div  class="row">
            <div class="col-md-12" style="margin-top: 80px;">
                <div class="card-header uppercase" hidden align="center">
                    <div class="caption">
                        <i class="ti-briefcase"></i> Relevant History
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Team</th>
                                <th>Table Position</th>
                                <th>Initial Rule</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>
                                    Chelsea Vs Everton
                                    <input type="text" value="Chelsea" class="home" name="home">
                                    <input type="text" value="Everton" class="away" name="away">
                                </td>
                                <td>13</td>
                                <td class="text-center">X, 1, 2, 1X, 2X</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Replay Home</button>
                                    <button class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Replay Away</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- BOF FOOTER -->
        <div class="footer">
            <p class="text-center">Copyright © 2023 Vinna (BOT). All rights reserved.</p>
        </div>
        <!-- Preloader -->
        <div id="preloader"></div>
        <!-- EOF FOOTER -->
        <div id="overlay"></div>

    </div> <!-- END WRAPPER -->

    <script src="assets/scripts/siqtheme.js"></script>
    <script src="assets/scripts/pages/dashboard1.js"></script>
</body>
</html>