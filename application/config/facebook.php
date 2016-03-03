<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string  Your facebook app ID.
|  facebook_app_secret           string  Your facebook app secret.
|  facebook_login_type           string  Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string  URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string  URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array   The permissions you need.
*/

$config['facebook_app_id']              = '1574790739510580';
$config['facebook_app_secret']          = '6c17ddaca16d9b8417e7c1f7f0acc4a1';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'index.php/login/login_fb';
$config['facebook_logout_redirect_url'] = 'index.php/welcome/logout';
//$config['facebook_permissions']         = array('email,user_birthday,user_location,public_profile');
$config['facebook_permissions']         = array('email,user_birthday,user_location,public_profile, user_friends, publish_actions, user_location');
