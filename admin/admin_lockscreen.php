<?php
    session_start();
    require_once('config/config.php');

    //handle unclock
    if(isset($_POST['unlock']))
    {
        $admin_email = $_POST['admin_email'];
        $admin_password = sha1(md5($_POST['admin_password']));//double encrypt to increase security
        $stmt=$conn->prepare("SELECT admin_email, admin_password  FROM liteERP_admin  WHERE admin_email =? AND admin_password =?");
        $stmt->bind_param('ss',  $admin_email, $admin_password);//bind fetched parameters
        $stmt->execute();//execute bind 
        $stmt -> bind_result($admin_email, $admin_password);//bind result
        $rs=$stmt->fetch();
        if($rs)
        {
            //if its sucessfull
            header("location:admin_dashboard.php");
        }
        else
        {
            $err = "Access Denied Please Check Your Credentials";
        }
}  
?>
<!DOCTYPE html>
<html lang="en">
    <!--Head -->
    <?php require_once('partials/head.php');?>
    <!-- ./ Head -->
    <body class="form">
        
        <?php
            $admin_id = $_SESSION['admin_id'];
            $ret="SELECT * FROM `liteERP_admin` WHERE admin_id =? "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i', $admin_id);
            $stmt->execute();
            $res=$stmt->get_result();
            $cnt=1;
            while($row=$res->fetch_object())
            {
                //Show default image if logged in user has no profile pic
                if($row->icon == '')
                {
                    $img = "<img src='assets/img/police_officers/profile.png' class='usr-profile' alt='avatar'>";
                }
                else
                {
                    $img = "<img src='assets/img/police_officers/$row->icon' class='usr-profile' alt='avatar'>";
                }
        ?>
            <div class="form-container">
                <div class="form-form">
                    <div class="form-form-wrap">
                        <div class="form-container">
                            <div class="form-content">

                                <div class="d-flex user-meta">
                                    <img src="assets/img/profile-7.jpg" class="usr-profile" alt="avatar">
                                    <div class="">
                                        <p class="">Shaun Park</p>
                                    </div>
                                </div>

                                <form method="post" class="text-left">
                                    <div class="form">

                                        <div id="password-field" class="field-wrapper input mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="field-wrapper toggle-pass">
                                                <p class="d-inline-block">Show Password</p>
                                                <label class="switch s-primary">
                                                    <input type="checkbox" id="toggle-password" class="d-none">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="field-wrapper">
                                                <button type="submit" class="btn btn-primary" value="">Unlock</button>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </form>                        
                                <p class="terms-conditions">© 2020 - <?php echo date("Y");?> All Rights Reserved. Powered By <a target ="_blank" href="https://devlan.martdev.info">Devlan</a>. </p>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="form-image">
                    <div class="l-image">
                    </div>
                </div>
            </div>
        <?php }?>

        
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/authentication/form-1.js"></script>

    </body>

</html>