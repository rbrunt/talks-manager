<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'errors/error_404';

// Begin custom routing:
$route['talks/talk/(:num)/submitquestion'] = 'questions/add/$1';
$route['series/:num'] = 'series';
$route['talks/talk/(:num)/embed'] = 'talks/embed/$1';
$route['talks/:num'] = 'talks';
$route['talks/future/:num'] = 'talks/future';
$route['search/(:any)'] = 'search/index/$1';
$route['cookies'] = 'home/cookies';
$route['login/resetpassword/(:any)'] = 'admin/resetpassword/$1';
// Slug-Based routing
$route['^(?!talks|series|search|admin|login|cookies|ajax|download|about|questions|home|errors|api)([a-z0-9A-Z\-\.\~_]*)'] = 'series/byslug/$1';
$route['^(?!talks|series|search|admin|login|cookies|ajax|download|about|questions|home|errors|api)([a-z0-9A-Z\-\.\~_]*)/([a-z0-9A-Z\-\.\~_]*)'] = 'talks/byslug/$1/$2';
// $route['(:any)/(:any)'] = 'talks/byslug/$2'


/* End of file routes.php */
/* Location: ./application/config/routes.php */