<?php
/*
 * LCMX 4.0 会员登录后安全退出
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
session_unset();
session_destroy();
mx_msg("亲，已安全退出！","index.php?p=user");
?>
