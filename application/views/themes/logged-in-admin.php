<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />

        <?php
            if(!empty($meta)) {
                foreach ($meta as $name => $content) {
                    echo "\n\t\t";
                    ?>
                    <meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
                }
                echo "\n";
            }
            if(!empty($canonical)) {
                echo "\n\t\t";
                ?><link rel="canonical" href="<?php echo $canonical?>" /><?php
            }
	        echo "\n\t";
        ?>

        <title><?php echo $title; ?></title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/vendor/alertifyjs/css/alertify.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/vendor/alertifyjs/css/themes/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">

    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php $this->load->view('components/sidebar-nav'); ?>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <?php $this->load->view('components/sidebar-toggle-top'); ?>
                        <?php $this->load->view('components/top-nav-bar-search'); ?>
                        <?php $this->load->view('components/top-nav-bar'); ?>
                    </nav>

                    <?php echo $output;?>

                </div>
            </div>
        </div>
    </body>

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/alertifyjs/alertify.min.js'); ?>"></script>

    <?php
        foreach($js as $file){
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";
    ?>
</html>






