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

/*company */
$route[ADMIN.'company'] = ADMIN."Company";
$route[ADMIN.'company/add'] = ADMIN."Company/showForm";
$route[ADMIN.'company/edit/(:any)'] = ADMIN."Company/showForm/$1";
$route[ADMIN.'company/view/(:any)'] = ADMIN."Company/showView/$1";
$route[ADMIN.'company/save'] = ADMIN."Company/save";

/*restaurant */
$route[ADMIN.'restaurant'] = ADMIN."Restaurant";
$route[ADMIN.'restaurant/add'] = ADMIN."Restaurant/showForm";
$route[ADMIN.'restaurant/edit/(:any)'] = ADMIN."Restaurant/showForm/$1";
$route[ADMIN.'restaurant/view/(:any)'] = ADMIN."Restaurant/showView/$1";
$route[ADMIN.'restaurant/save'] = ADMIN."Restaurant/save";

/*admin */
$route[ADMIN.'user'] = ADMIN."Users";
$route[ADMIN.'user/add'] = ADMIN."Users/showForm";
$route[ADMIN.'user/edit/(:any)'] = ADMIN."Users/showForm/$1";
$route[ADMIN.'user/view/(:any)'] = ADMIN."Users/showView/$1";
$route[ADMIN.'user/save'] = ADMIN."Users/save";

// $route[ADMIN.'user/(:any)'] = ADMIN."Users/index/$1";
/*$route[ADMIN.'user/add/(:any)'] = ADMIN."Users/showForm/$1";
$route[ADMIN.'user/edit/(:any)/(:any)'] = ADMIN."Users/showForm/$1/$2";
*/

/*training materials */
$route[ADMIN.'training_materials'] = ADMIN."TrainingMaterials";
$route[ADMIN.'training_materials/add'] = ADMIN."TrainingMaterials/showForm";
$route[ADMIN.'training_materials/edit/(:any)'] = ADMIN."TrainingMaterials/showForm/$1";
$route[ADMIN.'training_materials/view/(:any)'] = ADMIN."TrainingMaterials/showView/$1";
$route[ADMIN.'training_materials/save'] = ADMIN."TrainingMaterials/save";

/*bulleting board */
$route[ADMIN.'bulletinbord'] = ADMIN."BulletinBord";
$route[ADMIN.'bulletinbord/add'] = ADMIN."BulletinBord/showForm";
$route[ADMIN.'bulletinbord/edit/(:any)'] = ADMIN."BulletinBord/showForm/$1";
$route[ADMIN.'bulletinbord/view/(:any)'] = ADMIN."BulletinBord/showView/$1";
$route[ADMIN.'bulletinbord/save'] = ADMIN."BulletinBord/save";

/*cleaning_heading */
$route[ADMIN.'cleaning_heading'] = ADMIN."CleaningHeading";
$route[ADMIN.'cleaning_heading/add'] = ADMIN."CleaningHeading/showForm";
$route[ADMIN.'cleaning_heading/edit/(:any)'] = ADMIN."CleaningHeading/showForm/$1";
$route[ADMIN.'cleaning_heading/view/(:any)'] = ADMIN."CleaningHeading/showView/$1";
$route[ADMIN.'cleaning_heading/save'] = ADMIN."CleaningHeading/save";

/*cleaning */
$route[ADMIN.'cleaning'] = ADMIN."Cleaning";
$route[ADMIN.'cleaning/add'] = ADMIN."Cleaning/showForm";
$route[ADMIN.'cleaning/edit/(:any)'] = ADMIN."Cleaning/showForm/$1";
$route[ADMIN.'cleaning/view/(:any)'] = ADMIN."Cleaning/showView/$1";
$route[ADMIN.'cleaning/save'] = ADMIN."Cleaning/save";

/* phone dictionary */
$route[ADMIN.'phone-dictionary'] = ADMIN."PhoneDictionary/showView/";

/* invoice */
$route[ADMIN.'invoice'] = ADMIN."Invoice";
$route[ADMIN.'invoice/add'] = ADMIN."Invoice/showForm";
$route[ADMIN.'invoice/edit/(:any)'] = ADMIN."Invoice/showForm/$1";
$route[ADMIN.'invoice/view/(:any)'] = ADMIN."Invoice/showView/$1";
$route[ADMIN.'invoice/save'] = ADMIN."Invoice/save";

/* suggestion */
$route[ADMIN.'suggestion'] = ADMIN."Suggestion";
$route[ADMIN.'suggestion/add'] = ADMIN."Suggestion/showForm";
$route[ADMIN.'suggestion/edit/(:any)'] = ADMIN."Suggestion/showForm/$1";
$route[ADMIN.'suggestion/view/(:any)'] = ADMIN."Suggestion/showView/$1";
$route[ADMIN.'suggestion/save'] = ADMIN."Suggestion/save";

/* Employee register */
// $route[ADMIN.'employee-register'] = ADMIN."Employee";
// $route[ADMIN.'employee-register/save'] = ADMIN."Employee/save";

// $route[ADMIN.'employee/add'] = ADMIN."Employee/showForm";
// $route[ADMIN.'employee/edit/(:any)'] = ADMIN."Employee/showForm/$1";

/*
$route[ADMIN.'employee'] = ADMIN."Employee";
$route[ADMIN.'employee/view/(:any)'] = ADMIN."Employee/showView/$1";
$route[ADMIN.'employee/save'] = ADMIN."Employee/save";
$route[ADMIN.'employee/save/employee'] = ADMIN."Employee/saveEmployee";

$route[ADMIN.'employee/add/(:any)'] = ADMIN."Employee/showForm/$1";
$route[ADMIN.'employee/edit/(:any)/(:any)'] = ADMIN."Employee/showForm/$1/$2";
*/
/*manager */
$route[ADMIN.'employee'] = ADMIN."Employee";
$route[ADMIN.'employee/add'] = ADMIN."Employee/showForm";
$route[ADMIN.'employee/edit/(:any)'] = ADMIN."Employee/showForm/$1";
$route[ADMIN.'employee/view/(:any)'] = ADMIN."Employee/showView/$1";
$route[ADMIN.'employee/save'] = ADMIN."Employee/save";

$route[ADMIN.'employee-registration'] = ADMIN."EmployeeRegister";
$route[ADMIN.'employee-registration/save'] = ADMIN."EmployeeRegister/save";
$route[ADMIN.'employee-registration/save-paperwork'] = ADMIN."EmployeeRegister/savePaperWork";

/*manager */
$route[ADMIN.'manager'] = ADMIN."Manager";
$route[ADMIN.'manager/add'] = ADMIN."Manager/showForm";
$route[ADMIN.'manager/edit/(:any)'] = ADMIN."Manager/showForm/$1";
$route[ADMIN.'manager/view/(:any)'] = ADMIN."Manager/showView/$1";
$route[ADMIN.'manager/save'] = ADMIN."Manager/save";

/* admin */
$route[ADMIN.'adminuser'] = ADMIN."AdminUser";
$route[ADMIN.'adminuser/add'] = ADMIN."AdminUser/showForm";
$route[ADMIN.'adminuser/edit/(:any)'] = ADMIN."AdminUser/showForm/$1";
$route[ADMIN.'adminuser/view/(:any)'] = ADMIN."AdminUser/showView/$1";
$route[ADMIN.'adminuser/save'] = ADMIN."AdminUser/save";

/* shift incharge */
$route[ADMIN.'shiftincharge'] = ADMIN."ShiftIncharge";
$route[ADMIN.'shiftincharge/add'] = ADMIN."ShiftIncharge/showForm";
$route[ADMIN.'shiftincharge/edit/(:any)'] = ADMIN."ShiftIncharge/showForm/$1";
$route[ADMIN.'shiftincharge/view/(:any)'] = ADMIN."ShiftIncharge/showView/$1";
$route[ADMIN.'shiftincharge/save'] = ADMIN."ShiftIncharge/save";



/* week incharge */
$route[ADMIN.'week'] = ADMIN."Week";
$route[ADMIN.'shiftincharge/add'] = ADMIN."ShiftIncharge/showForm";
$route[ADMIN.'shiftincharge/edit/(:any)'] = ADMIN."ShiftIncharge/showForm/$1";
$route[ADMIN.'shiftincharge/view/(:any)'] = ADMIN."ShiftIncharge/showView/$1";
$route[ADMIN.'shiftincharge/save'] = ADMIN."ShiftIncharge/save";
