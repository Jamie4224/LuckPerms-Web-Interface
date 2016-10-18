<?php
// Global settings
// Main url without 'www.' and an ending slash '/'
// Main url example: 'http://example.com'
$website_mainurl = "";
// Define error reporting
error_reporting(1);

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

/*
MIT License

Copyright (c) 2016 Jamie42(24)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

// Do you agree with the above license?
// To accept make the variable 'true'
$license_agreed = "false";
