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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about']       = 'page/about';
$route['contact']     = 'page/contact';
$route['send']        = 'page/send';

$route['event']           = 'event/archive';
$route['gallery/album']   = 'gallery/album';
$route['gallery/video']   = 'gallery/video';

$route['portfolio/(:any)']  = 'portfolio/read/$1';
$route['project/(:any)']    = 'project/read/$1';
$route['event/(:any)']      = 'event/read/$1';

$route['gallery/(:any)']    = 'gallery/read/$1';


// CART
$route['beforeCart/(:num)']    = 'Cart/beforeCart/$1';
$route['confirmCart']    = 'Cart/confirmCart';
$route['confirmPesan'] = 'Cart/confirmPesanan';



//api all Venue
$route['apiVenue'] = 'ApiVenue';
$route['apiVenueIdM-upos/(:num)']    = 'ApiVenue/Bysyc/$1';
$route['apiVenueIdM-daftarin/(:num)']    = 'ApiVenue/Organize/$1';


//api all Trx
$route['apiTrx'] = 'ApiTrx';
$route['apiTrxIdM-upos/(:num)']    = 'ApiTrx/Bysyc/$1';
$route['apiTrxInv/(:any)']    = 'ApiTrx/BysycInv/$1';
$route['apiTrxIdM-upos-count/(:num)']    = 'ApiTrx/BysycCount/$1';
$route['apiTrxIdM-daftarin/(:num)']    = 'apiTrx/Organize/$1';


//detail Trx
$route['apiDetailTrx'] = 'ApiDetailTrx';
