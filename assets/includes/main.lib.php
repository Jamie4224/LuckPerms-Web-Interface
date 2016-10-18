<?php
/*
MIT License

Copyright (c) 2016 Jamie42 (24)

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
// YOU SHOULD NOT EDIT THIS FILE FOR ANY REASON, EXCEPT IF YOU ARE REALLY GOING TO CHANGE THE SYSTEM
// SO I WILL ALSO NOT FULLY DOCUMENT THIS FILE

session_start();

// Define global variables
$current_user_is_logged_in = $_SESSION['logged_in'];
$current_user_username = $_SESSION['username'];
$current_user_password = $_SESSION['password'];
$current_user_access_level = $_SESSION['access_level'];