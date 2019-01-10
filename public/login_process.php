<?php
require_once('../private/initialize.php');


if(is_get_request()){
    redirect_to('login.php');
}
//validation of user name and password
if(is_blank($_POST['username'])){

    redirect_to_login("missing user name");

}
if(is_blank($_POST['password'])){
    redirect_to_login("missing password");

}
$username = $_POST['username'];
$password = $_POST['password'];
//checking if user exist
$user = get_user($username);


// validate password
if($user['password'] != $password){
    redirect_to_login("password incorrect");
}
// save in session
$_SESSION['userid']= $user['id'];

// redirect to case list
redirect_to('caselist.php');

?>