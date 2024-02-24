<?php
session_start();
require("includes/connect.php");

if(!isset ($_SESSION['v_admin_id'])){
    header('location:../manage/login.php');
}

$admin_id = $_SESSION['v_admin_id'];

//total admin
$queryAdmin = "SELECT * FROM managers";
@$resultAdmin = mysqli_query($connect, $queryAdmin);
@$rowAdmin = mysqli_fetch_assoc($resultAdmin);
@$rowAdminCount = mysqli_num_rows($resultAdmin);
$nameAdmin = $rowAdmin ['username'];


//total logs
$queryLogs = "SELECT * FROM logs";
@$resultLogs = mysqli_query($connect, $queryLogs);
@$rowLogsCount = mysqli_num_rows($resultLogs);


//Assign Access Key
if (isset($_POST['assign_key'])) {
    $disable_id = test_input($_POST ['delete_id']);
    $access_key = test_input_pass($_POST ['access_key']);
    $block_query = "UPDATE users SET  access_key ='$access_key' WHERE id='$disable_id' ";
    $block_result = mysqli_query($connect, $block_query);

    if ($block_result) {
        $disable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "Access key assigned!!",
                                         text: "",
                                         type: "success"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';
    } else {
        echo "<script>alert('Error resetting users account');window.location='index.php';</script>";
    }
}


//RESET
if (isset($_POST['reset'])) {
    $disable_id = test_input($_POST ['user_id']);
    $block_query = "UPDATE users SET blocked ='0', active_session = '0', valid_subscriber ='1' WHERE id='$disable_id' ";
    $block_result = mysqli_query($connect, $block_query);

    if ($block_result) {
        $disable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "Account has been reset!!!",
                                         text: "",
                                         type: "success"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';
    } else {
        echo "<script>alert('Error resetting users account');window.location='index.php';</script>";
    }
}


//BLOCK USER
if (isset($_POST['disable'])) {
    $disable_id = test_input($_POST ['user_id']);
    $block_query = "UPDATE users SET blocked ='1' WHERE id='$disable_id' ";
    $block_result = mysqli_query($connect, $block_query);

    if ($block_result) {
        $disable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "DISABLED!!!",
                                         text: "User account disabled!!",
                                         type: "warning"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';
    } else {
        echo "<script>alert('Error Disabling User');window.location='index.php';</script>";
    }
}
//UNBLOCK USER
if (isset($_POST['enable'])) {
    $disable_id =  test_input($_POST ['user_id']);
    $unblock_query = "UPDATE users SET blocked ='0' WHERE id='$disable_id' ";
    $unblock_result = mysqli_query($connect, $unblock_query);

    if ($unblock_result) {
        $enable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "Successful!!!",
                                         text: "User account enabled!!",
                                         type: "success"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';

    } else {
        echo "<script>alert('Error Validating User');window.location='index.php';</script>";
    }
}

//DELETE USER
if (isset($_POST['delete'])) {
    $unblock_id =  test_input($_POST ['delete_id']);

    $unblock_querydel = "DELETE FROM users WHERE id = '$unblock_id'";
    $unblock_resultdel = mysqli_query($connect, $unblock_querydel);

    if ($unblock_resultdel) {
        $delete_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "DELETED!!!",
                                         text: "Account Deleted!!",
                                         type: "warning"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';

    } else {
        echo "<script>alert('Error Deleting User');window.location='index.php';</script>";
    }
}

//VERIFY USER
if (isset($_POST['validate'])) {
    $disable_id =  test_input($_POST ['user_id']);
    $unblock_query = "UPDATE users SET valid_subscriber ='1' WHERE id='$disable_id' ";
    $unblock_result = mysqli_query($connect, $unblock_query);

    if ($unblock_result) {
        $enable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "VALIDATED!",
                                         text: "Users account validated!!",
                                         type: "success"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';

    } else {
        echo "<script>alert('Error Validating User');window.location='index.php';</script>";
    }
}


if (isset($_POST['invalidate'])) {
    $disable_id =  test_input($_POST ['user_id']);
    $unblock_query = "UPDATE users SET valid_subscriber ='0' WHERE id='$disable_id' ";
    $unblock_result = mysqli_query($connect, $unblock_query);

    if ($unblock_result) {
        $enable_callback =  '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "INVALIDATED!",
                                         text: "Users account Invalidated!!",
                                         type: "warning"
                                     }, function() {
                                         window.location.href=\'index.php\';
                                     });
                                 }, 1000);
                             </script>';

    } else {
        echo "<script>alert('Error Invalidating User');window.location='index.php';</script>";
    }
}

/*****STARTS HERE*******/
/******STARTS HERE********/
/*******STARTS HERE*********/
/********STARTS HERE**********/
/********PSTARTS HERE***********/
/***********PAGINATION LOGIC STARTS HERE*************/
$counter = "";
$qwery = "SELECT * FROM users";
$sql = mysqli_query($connect, $qwery);
$total = mysqli_num_rows($sql); //58

$adjacents = 3;
$targetpage = "index.php"; //your file name
$limit = 10; //how many items to show per page
@$page = $_GET['page'];//getting page number to display

if($page){
    $start = ($page - 1) * $limit; //first item to display on this page
}else{
    $start = 0;
}

/* Setup page values for display. */
if ($page == 0) $page = 1; //if no page var is given, default to 1.
$prev = $page - 1; //previous page is current page - 1
$next = $page + 1; //next page is current page + 1
$lastpage = ceil($total/$limit); //lastpage is total number of row in db divided by the limits of row to be shown.
$lpm1 = $lastpage - 1; //last page minus 1

$querye = "SELECT * FROM users  ORDER BY id DESC LIMIT $start ,$limit";
@$resulte = mysqli_query($connect, $querye);
@$counte = mysqli_num_rows($resulte);



/* CREATE THE BOOTSTRAP PAGINATION BUTTONS */
$pagination = "";
if($lastpage > 1)
{
    $pagination .= "<ul class='pagination'>";
    if ($page > @$counter + 1) {//if the page number is greater than one show the previous page button <<<
        $pagination.= "<li><a href=\"$targetpage?page=$prev\">&laquo;</a></li>";
    }

    //show only six pages if the $lastpage value is less than 7
    if ($lastpage < 7 + ($adjacents * 2))
    {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
            if ($counter == $page)
                $pagination.= "<li class='active' ><a href='#' >$counter</a></li>";
            else
                $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
        }
    }
    elseif($lastpage > 5 + ($adjacents * 2)) //hide some if the pages are too much
    {
//close to beginning; only hide later pages
        if($page < 1 + ($adjacents * 2))
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><a href='#' >$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
        }
//in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><a href='#' >$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
            }
            $pagination.= "<li>...</li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
        }
//close to end; only hide early pages
        else
        {
            $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
            $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
            $pagination.= "<li>...</li>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage;
                 $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li><a href='#' class='active'>$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
            }
        }
    }

//next button
    if ($page < $counter - 1)
        $pagination.= "<li><a href=\"$targetpage?page=$next\">&raquo;</a></li>";
    else
        $pagination.= "";
    $pagination.= "</ul>\n";
}
/*****PAGINATION LOGIC ENDS HERE********/
/*******END*****/
/******END****/
/*****END***/
/****END**/
/***END**/



function test_input_pass($data) {
    $data = md5($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="assets/img/logo/favicon.png" type="image/x-icon" />
    <title>Vinna (Bot) | Admin</title>
    <link rel="apple-touch-icon" href="assets/img/logo/favicon.png" />
    <link rel="stylesheet" href="includes/sweetalert/sweetalert.css">
    <script src="includes/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/siqtheme.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard1.css">
</head>
<?= @$uploadImage_callback; ?>
<?= @$editPassword_callback; ?>
<?= @$editDetails_callback; ?>
<?= @$enable_callback; ?>
<?= @$disable_callback; ?>
<?= @$delete_callback; ?>
<?= @$edditImagecallback; ?>
<?= @$couldNotConnect; ?>
<?= @$successConnect; ?>
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
                            <a href="#" class="btn" data-toggle="dropdown">
                               Home
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="includes/logout.php" class="btn">
                                Logout
                            </a>
                        </div>
                        <div class="menu-item"></div>
                        <div class="menu-item"></div>
                    </div>
                    <!-- EOF Header Nav -->

                </div>
            </div>
        </div>
        <!-- BOF MAIN -->
        <div class="main" style="width: 100%;">
            <!-- BOF Breadcrumb -->
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="ti-home"></i> Admin</a></li>
                    </ol>
                </div>
            </div>
            <!-- EOF Breadcrumb -->

            <div class="row mt-5">
                <!-- Employees Sales -->
                <div class="col-md-4">
                    <div class="card mb-3" style="border-radius: 10px;">
                        <div class="card-body" style="text-align: center; font-size: 25px">
                            <p>Total Users <span class="fa fa-hourglass-start"></span></p>
                            <p><?= $total; ?></p>
                        </div>
                    </div>
                </div>
                <!-- My Tasks -->
                <div class="col-md-4">
                    <div class="card mb-3" style="border-radius: 10px;">
                        <div class="card-body" style="text-align: center; font-size: 25px">
                            <p>Total Admins <span class="fa fa-user-circle"></p>
                            <p><?= $rowAdminCount; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3" style="border-radius: 10px;">
                        <div class="card-body" style="text-align: center; font-size: 25px">
                            <p>Total Logs <span class="fa fa-book"></p>
                            <p><?= $rowLogsCount; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Year Comparison Chart -->
            <div class="row">
                <div class="col-md-12">
                        <div class="card-header uppercase">
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Login Status</th>
                                        <th class="text-center">Reset</th>
                                        <th class="text-center">User Access</th>
                                        <th class="text-center">Verify/Validate</th>
                                        <th class="text-center">Access Key</th>
                                        <th class="text-center">Trash</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x=0;
                                    while ($x <= $counte && $row1 = mysqli_fetch_array($resulte)) {
                                    $x++;
                                    $userId = $row1['id'];
                                    $blockedUser = $row1 ['blocked'];
                                    $userName = $row1['username'];
                                    $userEmail = $row1['email'];
                                    $active_session = $row1['active_session'];
                                    $access_key = $row1['access_key'];
                                    $valid_subscriber = $row1['valid_subscriber'];
                                    ?>
                                    <tr>
                                        <th><?= $x; ?></th>
                                        <td><?= $userName; ?></td>
                                        <td><?= $userEmail; ?></td>
                                        <td>
                                            <?php
                                            if($active_session == 1){
                                                echo "<span style='color: #6cb73b'>Online <span class='fa fa-check-circle-o'></span></span>";
                                            }else{
                                                echo "<span style='color: #ff6666'>Offline <span class='fa fa-close'></span></span>";
                                            }
                                            ?>
                                        </td>
                                        <form method="post">
                                            <td class="text-center">
                                                <input type="text" hidden name="user_id" value="<?= $userId; ?>">
                                                <button name="reset" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Reset</button>
                                            </td>
                                            <td class="text-center">
                                                <button name="disable" <?php if($blockedUser == 1){echo "hidden";} ?> class="btn btn-sm btn-danger"><i class="fa fa-lock"></i> Lock</button>
                                                <button name="enable" <?php if($blockedUser == 0){ echo "hidden";} ?> class="btn btn-sm btn-success"><i class="fa fa-check-circle-o"></i> Unlock</button>
                                            </td>
                                            <td class="text-center">
                                                <button name="invalidate" <?php if($valid_subscriber == 0){ echo "hidden";} ?> class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Invalidate</button>
                                                <button name="validate" <?php if($valid_subscriber == 1){ echo "hidden";} ?> class="btn btn-sm btn-success"><i class="fa fa-check-circle-o"></i> Validate</button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" onclick="document.getElementById('delete_id_asign').value = <?= $userId; ?>;" data-toggle="modal" href="#assign" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Assign Key</button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="document.getElementById('delete_id_form').value = <?= $userId; ?>;" data-toggle="modal" href="#delete" ><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right"><?= $pagination ?></div>
                        </div>
                </div>
            </div>


        </div>
        <!-- EOF MAIN -->

        <!-- BOF FOOTER -->
        <div class="footer">
            <p class="text-center">Copyright © 2023 Vinna (BOT). All rights reserved.</p>
        </div>


        <!-- Confirm Delete modal modal -->
        <!-- /.modal -->
        <div class="modal fade bs-modal-sm" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title text-danger" align="center"><b>Delete</b></h4>
                            <span id="delete_alert"></span>
                        </div>
                        <div class="modal-body" align="center">
                            Are you sure ?<br>
                            This will permanently delete this user's account from the portal.
                            Click confirm delete to complete this action!
                            <input type="hidden" name="delete_id" id="delete_id_form"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete" class="btn btn-danger delete">Confirm Delete</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>


<!--        Assign Access key-->
        <div class="modal fade bs-modal-sm" id="assign" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title text-info" align="center"><b>Delete</b></h4>
                            <span id="delete_alert"></span>
                        </div>
                        <div class="modal-body" align="center">
                            Click on the refresh button below to generate an access key for user.
                            <input type="hidden" name="delete_id" id="delete_id_asign"/>
                            <input type="number" required class="form-control" placeholder="Access Key" name="access_key" id="access_key"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="assign_key" class="btn btn-azure delete">Assign Key</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
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