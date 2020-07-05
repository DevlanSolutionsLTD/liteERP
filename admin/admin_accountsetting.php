<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

?>
<?php
if(isset($_POST['admin_edit']))
{
    $admin_id = $_SESSION['admin_id'];
    $admin_email=$_POST['admin_email'];
    $admin_name=$_POST['admin_name'];
    $pic=$_FILES["pic"]["name"];
    move_uploaded_file($_FILES["pic"]["tmp_name"],"assets/img/".$_FILES["pic"]["name"]);
    $query="update liteERP_admin set admin_email=?, admin_name=?, admin_dpic=? where admin_id=?";
    $stmt = $conn->prepare($query);
    $rc=$stmt->bind_param('sssi', $admin_email, $admin_name, $pic, $admin_id);
    $stmt->execute();
    $success = "Successively updated Admin info";
    }
    ?>

<!DOCTYPE HTML>
<html>
	<!--Head-->
	<?php require_once("partials/head.php");?>
	<!--./Head-->
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php require_once("partials/nav.php");?>
    <!--  END NAVBAR  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <?php require_once("partials/top_bar.php");?>
        <!--  END TOPBAR  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">                
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info"  enctype="multipart/form-data" class="section general-info" Method="post">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                            <input type="file" name="pic" id="input-file-max-fs"class="dropify" data-default-file="assets/img/user-profile.jpeg"data-max-file-size="2M" >
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Admin Name</label>
                                                                            <input type="text" class="form-control mb-4" name="admin_name" id="fullName">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                <div class="form-group">
                                                                    <label for="profession">E-mail</label>
                                                                    <input type="email" class="form-control mb-4" name="admin_email" id="email" placeholder="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <input type="submit" name="admin_edit" value="Update" class="btn btn-warning mb-8 mr-4 btn-rounded">
                                    </form>
                                </div>
</div>
                               <!-- begin footer-->
<?php require_once('partials/footer.php');?>    
        <!--end footer-->
                </div>
             </div>  
       
        <!--  END CONTENT AREA  -->
                    
    </div>
    <!-- END MAIN CONTAINER -->
  
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
        <script src="assets/js/users/account-settings.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="assets/js/users/account-settings.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>


</html> 