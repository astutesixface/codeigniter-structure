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

$route['default_controller'] = 'welcome';
$route['admin/category.html'] = 'admin/category';
$route['admin/exists'] = 'admin/welcome/exists';
$route['admin/exists/(:any)'] = 'admin/welcome/exists/$1';

$route['admin/site_settings/(:any)'] = 'admin/site_settings/index/$1';

$route['admin/seo_settings/(:any)'] = 'admin/seo_settings/index/$1';


$route['admin/general_settings/(:any)'] = 'admin/general_settings/index/$1';
$route['admin/general_settings/(:any)/(:any)'] = 'admin/general_settings/index/$1/$2';


$route['admin/blog_category/(:any)'] = 'admin/blog_category/index/$1';
$route['admin/blog_category/(:any)/(:any)'] = 'admin/blog_category/index/$1/$2';


$route['admin/slider/(:any)'] = 'admin/slider/index/$1';
$route['admin/slider/(:any)/(:any)'] = 'admin/slider/index/$1/$2';
$route['admin/slider/(:any)/(:any)/(:any)'] = 'admin/slider/index/$1/$2/$3';


$route['admin/blog/(:any)'] = 'admin/blog/index/$1';
$route['admin/blog/(:any)/(:any)'] = 'admin/blog/index/$1/$2';

$route['admin/user/(:any)'] = 'admin/user/index/$1';
$route['admin/user/(:any)/(:any)'] = 'admin/user/index/$1/$2';

$route['admin/business_settings/(:any)'] = 'admin/business_settings/index/$1';
$route['admin/business_settings/(:any)/(:any)'] = 'admin/business_settings/index/$1/$2';

$route['admin/language_settings/(:any)'] = 'admin/language_settings/index/$1';
$route['admin/language_settings/(:any)/(:any)'] = 'admin/language_settings/index/$1/$2';
$route['admin/language_settings/(:any)/(:any)/(:any)'] = 'admin/language_settings/index/$1/$2/$3';



$route['admin/social_links/(:any)'] = 'admin/social_links/index/$1';

$route['admin/report_stock'] = 'admin/report/stock';

$route['vendor/register'] = 'auth/register';

$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;
