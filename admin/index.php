<?php
require_once('../config.php');
//session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel and Tourism Management System</title>
    <link rel="icon" href="../assets/img/aeroplane6.png" type="image/png">
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Add your CSS file here -->
</head>
<body class="layout-fixed layout-footer-fixed text-sm sidebar-mini control-sidebar-slide-open layout-navbar-fixed text-dark" style="height: auto;">
    <div class="wrapper">
        <?php require_once('inc/header.php'); ?>
        <?php require_once('inc/topBarNav.php'); ?>
        <?php require_once('inc/navigation.php'); ?>

        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>

        <div class="content-wrapper bg-dark" style="min-height: 567.854px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?php echo ucwords(str_replace(array("/", "_"), " ", $page)); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content text-dark">
                <div class="container-fluid">
                    <?php 
                    if (!file_exists($page . ".php") && !is_dir($page)) {
                        include '404.html';
                    } else {
                        if (is_dir($page)) {
                            include $page . '/index.php';
                        } else {
                            include $page . '.php';
                        }
                    }
                    ?>
                </div>
            </section>

            <div class="modal fade text-dark" id="confirm_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            <div id="delete_content"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade text-dark" id="uni_modal" role='dialog'>
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade text-dark" id="uni_modal_right" role='dialog'>
                <div class="modal-dialog modal-full-height modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade text-dark" id="viewer_modal" role='dialog'>
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>
    </div>
</body>
</html>
