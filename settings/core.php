<?php
//start session
session_start(); 

//for header redirection
ob_start();

//funtion to check for login
function check_login() {
    if (!isset($_SESSION['customer_id'])) {
        header("Location: ../view/login.php");
    }
}

//function to get user ID
function get_user_id() {
    
    return $_SESSION['customer_id'];
}

//function to check for role (admin, customer, etc)
function check_role() {
    if (isset($_SESSION['user_role'])) {

        $user_permission = $_SESSION['user_role'];
		if ($user_permission != 1) {
			//redirect user
    		header('Location: ../view/dashboard.php');
		}
    }
}

//function to return client's ip address
//code obtained from
//https://www.hashbangcode.com/article/get-ip-address-visitor-through-php

function get_Ip_address(){
    if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
     // Check IP from internet.
     $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
     // Check IP is passed from proxy.
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
     // Get IP address from remote address.
     $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


?>