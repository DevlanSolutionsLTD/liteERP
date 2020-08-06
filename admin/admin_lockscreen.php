<?php
    session_start();
    require_once('config/config.php');
    
    //handle unclock
    if(isset($_POST['unlock']))
    {
        if ( empty($_POST["login_user_password"])) 
        {
            $err="Blank Values Not Accepted!";
        }
        else
        { 
          
            $login_user_email = $_POST['login_user_email'];
            $login_user_password = sha1(md5($_POST['login_user_password']));//double encrypt to increase security
            $stmt=$conn->prepare("SELECT login_user_email, login_user_password  FROM liteERP_Login  WHERE login_user_email =? AND login_user_password =?");
            $stmt->bind_param('ss',  $login_user_email, $login_user_password);//bind fetched parameters
            $stmt->execute();//execute bind 
            $stmt -> bind_result($login_user_email, $login_user_password);//bind result
            $rs=$stmt->fetch();
            if($rs)
            {
                //if its sucessfull
                header("location:admin_dashboard.php");
            }
            else
            {
                $err = "Incorrect Credentials";
            }
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
            $login_user_email = $_SESSION['login_user_email'];
            $ret = "SELECT * FROM  liteERP_admin  WHERE admin_email = '$login_user_email'"; 
            $stmt = $conn->prepare($ret) ;
            $stmt->execute() ;
            $res = $stmt->get_result();
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
                                            <input id="email" name="login_user_email"  type="email" value="<?php echo $superAdmin->admin_email;?>" class="form-control" placeholder="Password">
                                        </div>

                                        <div id="password-field" class="field-wrapper input mb-2">
                                            <input id="password" name="login_user_password" type="password" class="form-control" placeholder="Password">
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