<?php
/*安全退出*/
require (dirname(dirname(__FILE__)).'/common/common.php');
/*销毁session*/
session_unset();
session_destroy();
mx_msg("亲，您已安全退出！","../login.php");
?>
