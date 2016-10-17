<?php
// Login settings
// Choose between superuser(Just one root account) or sql(Coming soon)
$authentication_method = "superuser";
$superuser_username = "root";
$superuser_password = "user";

// Minecraft PControl sql settings (Coming soon)
$mcpc_sql_ip = "";
$mcpc_sql_port ="";
$mcpc_sql_user = "";
$mcpc_sql_password = "";
$mcpc_sql_db = "";
$mcpc_sql_db_prefix = "mcpc_";

// Luckperms sql settings
$luckperms_sql_ip = "127.0.0.1";
$luckperms_sql_port = "3306";
$luckperms_sql_user = "root";
$luckperms_sql_password = "";
$luckperms_sql_db = "";

// Luckperms insql settings
// Please define which LuckPerms functions are stored in sql
$luckperms_insql_user = "false";
$luckperms_insql_group = "false";
$luckperms_insql_track = "false";
$luckperms_insql_uuid = "false";
$luckperms_insql_log = "false";

// Google recaptcha settings
// Testing purposes? Use the '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI' sitekey
$google_recaptcha_activated = "false";
$google_recaptcha_sitekey = "";
$google_recaptcha_secretkey = "";
?>