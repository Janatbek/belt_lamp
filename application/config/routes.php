<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['main'] = 'users';
$route['destroy/(:num)'] = 'products/destroy/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
