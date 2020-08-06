<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    if(isset($_POST['admin_edit']))
    {
        //Implement Error handling
        $error = 0;

        //prevent posting blank value for admin_name
        if (isset($_POST['admin_email']) && !empty($_POST['admin_email']))
        {
            $admin_email=mysqli_real_escape_string($conn,trim($_POST['admin_email']));
        }
        else
        {
            $error = 1;
            $err="Email Cannot Be Empty";
        }

        //Prevent posting blank value for admin_name
        if (isset($_POST['admin_name']) && !empty($_POST['admin_name'])) 
        {
            $admin_name=mysqli_real_escape_string($conn,trim($_POST['admin_name']));
        }
        else
        {
            $error = 1;
            $err="Name Cannot Be Empty";
        }
        
        //Prevent posting blank value for admin_bio | about |
        if (isset($_POST['admin_bio']) && !empty($_POST['admin_bio'])) {
            $admin_bio=mysqli_real_escape_string($conn,trim($_POST['admin_bio']));
        }
        else
        {
            $error = 1;
            $err="Biography Cannot Be Empty";
        }

        //No errors encountered that is no blank values posted,
        $admin_email = $_SESSION['login_user_email'];
        $admin_name = $_POST['admin_name'];
        $admin_bio = $_POST['admin_bio'];
        $pic=$_FILES["pic"]["name"];
        move_uploaded_file($_FILES["pic"]["tmp_name"],"assets/img/".$_FILES["pic"]["name"]);
        $query="UPDATE liteERP_admin SET admin_name =?, admin_bio =?, admin_dpic =? WHERE admin_email =?";
        $stmt = $conn->prepare($query);
        $rc=$stmt->bind_param('ssssi', $admin_email, $admin_name, $admin_bio, $pic, $admin_id);
        $stmt->execute();

        if($stmt)
        {
            //inject alert that profile is updated 
            $success = "Profile Updated" && header("refresh:1; url=admin_dashboard.php");
        }
        else 
        {
            //inject alert that profile update task failed
            $info = "Please Try Again Or Try Later";
        }
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
        <?php 
            require_once("partials/top_bar.php");
            $login_user_email = $_SESSION['login_user_email'];
            $ret = "SELECT * FROM  liteERP_admin  WHERE admin_email = '$login_user_email'"; 
            $stmt = $conn->prepare($ret) ;
            $stmt->execute() ;
            $res = $stmt->get_result();
            while($superAdmin = $res->fetch_object())
            {
                //default profile pic if logged in user has no profile picture
                if($superAdmin->admin_dpic == '')
                {
                    $profilePic = "boy.png";
                }
                else
                {
                    $profilePic = $superAdmin->admin_dpic;
                }
        ?>
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
                                                            <input type="file" name="pic" id="input-file-max-fs" class="img-thumbnail dropify" data-default-file="assets/img/<?php echo $profilePic;?>"data-max-file-size="2M" >
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload  Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Admin Name</label>
                                                                            <input type="text" class="form-control mb-4" value="<?php echo $superAdmin->admin_name;?>" name="admin_name" id="fullName">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="profession">E-mail</label>
                                                                            <input type="email" class="form-control mb-4" value="<?php echo $superAdmin->admin_email;?>" name="admin_email" id="email" placeholder="" value="">
                                                                        </div>
                                                                    </div>

                                                                    <!--Load editor-->
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="profession">Biography | About <?php echo $superAdmin->admin_name;?></label>
                                                                            <textarea type="text" class="form-control mb-4" rows="10" name="admin_bio"><?php echo $superAdmin->admin_bio;?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="submit" name="admin_edit" value="Update" class="btn btn-outline-warning mb-8 mr-4 btn-rounded">
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- begin footer-->
                        <?php require_once('partials/footer.php'); }?>    
                    <!--end footer-->
                </div>
            </div>  
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
  
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <?php require_once('partials/scripts.php');?>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>


</html> 