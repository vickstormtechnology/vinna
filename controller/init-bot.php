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
    <style>
        .click:hover{
            background: #2e934c  !important;
            cursor: pointer;
        }
    </style>
</head>

<body class="theme-dark">
    <div class="grid-wrappe sidebar-bg bg1">

        <!-- BOF MAIN -->
        <div class="main" style="width: 100%;">
            <div class="row mt-1">
                <!-- Employees Sales -->
                <div class="col-md-4" >
                    <div class="card mb-3 click start_betting" style="border-radius: 10px;color: white;">
                        <div class="card-body" style="text-align: center; font-size: 25px">
                            <p>Start Betting <span class="fa fa-hourglass-start"></span></p>
                        </div>
                    </div>
                </div>
                <!-- My Tasks -->
                <div class="col-md-4">
                    <div class="card mb-3 click terminate_bot" style="border-radius: 10px;color: white;">
                        <div class="card-body" style="text-align: center; font-size: 25px">
                            <p>Terminate Bot <span class="fa fa-power-off"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a href="logs.php">
                        <div class="card mb-3 click" style="border-radius: 10px;">
                            <div class="card-body" style="text-align: center; font-size: 25px; color: white;">
                                <p>logs <span class="fa fa-refresh"></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Year Comparison Chart -->
            <div class="row">
                <div class="col-md-12">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                    <tr>
                                        <th style="background: rgba(89,203,122,0.6);">Football Team</th>
                                        <th style="background: rgba(89,203,122,0.6);">Table Position</th>
                                        <th style="background: rgba(89,203,122,0.6);">Rule</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">Team Vs Team</td>
                                        <td>
                                            <select name="position" class="form-control position">
                                                <option value="7 - 16">7 - 16 (of table)</option>
                                                <option value="8 - 16">8 - 16 (of table)</option>
                                                <option value="9 - 16">9 - 16 (of table)</option>
                                                <option value="7 - 15">7 - 15 (of table)</option>
                                                <option value="8 - 15">8 - 15 (of table)</option>
                                                <option value="9 - 15">9 - 15 (of table)</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="position" class="form-control position">
                                                <option value="X">X - Draw</option>
                                                <option value="1X">1X - Home Win | Draw</option>
                                                <option value="2X">2X - Away Win | Draw</option>
                                                <option value="1">1 - Home Win</option>
                                                <option value="2">2 - Away Win</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- EOF MAIN -->

        <!-- BOF FOOTER -->
        <div class="footer" hidden>
            <p class="text-center">Copyright © 2023 Vinna (BOT). All rights reserved.</p>
        </div>
        <!-- Preloader -->
        <div id="preloader"></div>
        <!-- EOF FOOTER -->
        <div id="overlay"></div>

    </div> <!-- END WRAPPER -->

    <script src="assets/scripts/siqtheme.js"></script>
    <script src="assets/scripts/pages/dashboard1.js"></script>
    <script src="assets/scripts/jquery.2.2.3.min.js"></script>
    <script src="ajax-files/admin.js"></script>
</body>
</html>