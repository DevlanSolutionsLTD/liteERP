<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="assets/js/authentication/form-2.js"></script>
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
<script src="assets/js/custom.js"></script>
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="assets/js/users/account-settings.js"></script>
<script src="assets/js/custom.js"></script>
<script src="plugins/dropify/dropify.min.js"></script>
<script src="plugins/blockui/jquery.blockUI.min.js"></script>
<script src="assets/js/users/account-settings.js"></script>
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>
<script src="assets/js/authentication/form-2.js"></script>

<!--Prevent LockScreen From Going Back-->
<script type = "text/javascript" >
    var path = 'admin_lockscreen.php'; 
    history.pushState(null, null, path + window.location.search);
    window.addEventListener('popstate', function (event) {
        history.pushState(null, null, path + window.location.search);
    });
</script>