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
$route['admin/403'] = 'admin/page403/index';
$route['parse/(:any)'] = 'parse/index/$1';

$route['default_controller'] = 'ads/index';
#$route['ads/(:any)'] = 'ads/view_ads/$1';
$route['p/(:any)'] = 'ads/index/$1';
$route['p'] = 'ads/index/0';
#$route['ads'] = 'ads';
$route['object/(:any)'] = 'ads/object/$1';

$route['search'] = 'fulltextsearch/search';  //Не используется
$route['search/(:any)'] = 'fulltextsearch/search/$1'; //Не используется

$route['news'] = 'news';
$route['news/(:any)'] = 'news/show/$1';

$route['page/(:any)'] = 'pages/view/$1';
$route['page'] = 'pages';

$route['get_type/(:any)'] = 'ads/get_type/$1';

// -------- ADMIN SECTION -----------
$route['admin'] = 'admin/ads/index';
$route['admin/p'] = 'admin/ads/index/0';
$route['admin/p/(:any)'] = 'admin/ads/index/$1';
$route['admin/new'] = 'admin/ads/create';
$route['admin/edit/(:any)'] = 'admin/ads/edit/$1';
$route['admin/edit/(:any)/save'] = 'admin/ads/edit/$1/save';
$route['admin/upload/(:any)'] = 'admin/ads/uploadimages/$1';
$route['admin/removeimage/(:any)'] = 'admin/ads/removeimage/$1';
$route['admin/action'] = 'admin/ads/action';

$route['admin/banners'] = 'admin/banners/index';
$route['admin/banners/edit/(:any)'] = 'admin/banners/edit/$1';
$route['admin/banners/edit/(:any)/save'] = 'admin/banners/edit/$1/save';
$route['admin/banners/action'] = 'admin/banners/action';
$route['admin/banners/new'] = 'admin/banners/create';
$route['admin/banners/upload/(:any)'] = 'admin/banners/upload_image/$1';
$route['admin/banners/remove_image/(:any)'] = 'admin/banners/remove_image/$1';

$route['admin/slides'] = 'admin/slides/index';
$route['admin/slides/edit/(:any)'] = 'admin/slides/edit/$1';
$route['admin/slides/edit/(:any)/save'] = 'admin/slides/edit/$1/save';
$route['admin/slides/action'] = 'admin/slides/action';
$route['admin/slides/new'] = 'admin/slides/create';
$route['admin/slides/upload/(:any)'] = 'admin/slides/upload_image/$1';
$route['admin/slides/remove_image/(:any)'] = 'admin/slides/remove_image/$1';

$route['admin/ipoteka'] = 'admin/dashboard/ipoteka';
$route['admin/ipoteka/save'] = 'admin/dashboard/ipoteka/save';

$route['admin/services'] = 'admin/dashboard/services';
$route['admin/services/save'] = 'admin/dashboard/services/save';

$route['admin/actions'] = 'admin/dashboard/actions';
$route['admin/actions/save'] = 'admin/dashboard/actions/save';


$route['admin/education'] = 'admin/dashboard/education';
$route['admin/education/save'] = 'admin/dashboard/education/save';

$route['admin/contact'] = 'admin/dashboard/contact';
$route['admin/contact/save'] = 'admin/dashboard/contact/save';

$route['admin/news'] = 'admin/news/index';
$route['admin/news/edit/(:any)'] = 'admin/news/editor/$1';
$route['admin/news/edit/(:any)/save'] = 'admin/news/editor/$1/save';
$route['admin/news/new'] = 'admin/news/create';
$route['admin/news/action'] = 'admin/news/action';

$route['admin/about'] = 'admin/dashboard/about';
$route['admin/about/save'] = 'admin/dashboard/about/save';

$route['admin/config_page'] = 'admin/dashboard/config_page';
$route['admin/config_page/save'] = 'admin/dashboard/config_page/save';

$route['admin/login'] = 'admin/login/index';
$route['admin/login/list'] = 'admin/login/users_list';
$route['admin/login/create'] = 'admin/login/create';
$route['admin/login/edit/(:any)'] = 'admin/login/edit/$1';
$route['admin/login/delete/(:any)'] = 'admin/login/delete/$1';
$route['admin/logout'] = 'admin/login/out';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
