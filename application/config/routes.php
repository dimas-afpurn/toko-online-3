<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
//$route[''] = 'beranda_c/detail/$1';
$route['cart'] = 'user/home/cart';
$route['cart/shipment'] = 'user/home/checkout';
$route['provinsi'] = 'user/home/provinsi';
$route['kota/(:any)'] = 'user/home/kota/$1';
$route['tarif/(:any)/(:any)/(:any)/(:any)'] = 'user/home/tarif/$1/$2/$3/$4';
$route['user/order/simpan'] = 'user/order/simpan';
$route['order'] = 'user/order/search_order';
$route['payment/thank-you/(:any)'] = 'user/order/konfirmasi_bayar/$1';
$route['cara-belanja'] = 'user/home/panduan';
$route['kontak-kami'] = 'user/home/kontak';
$route['login'] = 'user/home/login';
$route['register'] = 'user/home/register';
$route['insert_register'] = 'user/home/insert_register';
$route['user/account/profile'] = 'user/home/akun';
$route['produk/produk-terbaru'] = 'user/home/produk_terbaru';
$route['produk/produk-terlaris'] = 'user/home/produk_terlaris';
$route['produk/produk-termurah'] = 'user/home/produk_termurah';
$route['promo'] = 'user/home/promo';
$route['logout'] = 'user/home/logout';
$route['rajaongkir'] = 'user/rajaongkir';


$route['user/purchase/order/(:any)'] = 'user/home/detail_order/$1';
$route['produk/(:any)/(:any)/(:any)'] = 'user/home/detail2/$1/$2/$3';
$route['(:any)'] = 'user/home/produk/$1';
$route['(:any)/(:any)'] = 'user/home/detail/$1/$2';


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
