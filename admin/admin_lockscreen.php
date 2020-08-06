<?php
    session_start();
    require_once('config/config.php');
    
    //handle unclock
    if(isset($_POST['unlock']))
    {
        //Implement Error handling
        $error = 0;

        //prevent posting blank value for password
        if (isset($_POST['admin_password']) && !empty($_POST['admin_password']))
        {
            $admin_password = mysqli_real_escape_string($conn,trim(sha1(md5($_POST['admin_password']))));
        }
        else
        {
            $error = 1;
            $err="Password Cannot Be Empty";
        }

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
            $stmt= $conn->prepare($ret) ;
            $stmt->bind_param('i', $admin_id);
            $stmt->execute();
            $res=$stmt->get_result();
            $cnt=1;
            while($superAdmin = $res->fetch_object())
            {
                //Show default image if logged in user has no profile pic
                if($superAdmin->admin_dpic == '')
                {
                    $img = "<img src='assets/img/boy.png' class='usr-profile' alt='avatar'>";

                    
                }
                else
                {
                    $img = "<img src='assets/img/$superAdmin->admin_dpic' class='usr-profile' alt='avatar'>";
                }
        ?>
            <div class="form-container">
                <div class="form-form">
                    <div class="form-form-wrap">
                        <div class="form-container">
                            <div class="form-content">

                                <div class="d-flex user-meta">
                                    <?php echo $img;?>
                                    <div class="">
                                        <p class=""><?php echo $superAdmin->admin_name;?></p>
                                    </div>
                                </div>

                                <form method="post" method="post" class="text-left">
                                    <div class="form">
                                        <div id="" class="field-wrapper input mb-2" style="display:none">
                                            <input id="email" name="admin_email"  type="email" value="<?php echo $superAdmin->admin_email;?>" class="form-control" placeholder="Password">
                                        </div>

                                        <div id="password-field" class="field-wrapper input mb-2">
                                            <input id="password" name="admin_password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="field-wrapper">
                                                <button type="submit" name="unlock" class="btn btn-primary" value="">Unlock</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>                        
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
    </body>
    <?php require_once('partials/scripts.php'); }?>

</html>