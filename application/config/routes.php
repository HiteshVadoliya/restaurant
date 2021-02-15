<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = 'MyCustom404Ctrl';
$route['translate_uri_dashes'] = FALSE;
/* User start */

$route['admin'] = 'admin/login';

/*********** USER DEFINED ROUTES *******************/

$route['privacy-policy'] = 'Welcome/policy';
$route['loginMe'] = 'admin/login/loginMe';
$route['admin/dashboard'] = 'admin/user';
$route['admin/logout'] = 'admin/user/logout';

$route['admin/loadChangePass'] = "admin/user/loadChangePass";
$route['admin/changePassword'] = "admin/user/changePassword";
$route['admin/pageNotFound'] = "admin/user/pageNotFound";

$route['admin/forgotPassword'] = "admin/login/forgotPassword";
$route['admin/resetPasswordUser'] = "admin/login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "admin/login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "admin/login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "admin/login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "admin/login/createPasswordUser";
/* End of file routes.php */

/*Category */
$route[ADMIN.'category'] = ADMIN."CategoryController";
$route[ADMIN.'category/add'] = ADMIN."CategoryController/showForm";
$route[ADMIN.'category/edit/(:any)'] = ADMIN."CategoryController/showForm/$1";
$route[ADMIN.'category/save'] = ADMIN."CategoryController/save";


/*Newspaper */
$route[ADMIN.'newspaper'] = ADMIN."Newspaper";
$route[ADMIN.'newspaper/add'] = ADMIN."Newspaper/showForm";
$route[ADMIN.'newspaper/edit/(:any)'] = ADMIN."Newspaper/showForm/$1";
$route[ADMIN.'newspaper/save'] = ADMIN."Newspaper/save";