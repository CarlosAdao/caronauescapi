<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

//Routes for localizacao
$route['localizacao']['get'] = 'localizacao/index';
$route['localizacao/(:num)']['get'] = 'localizacao/find/$1';
$route['localizacao']['post'] = 'localizacao/index';
$route['localizacao/(:num)']['put'] = 'localizacao/index/$1';
$route['localizacao/(:num)']['delete'] = 'localizacao/index/$1';

//Routes for Settings
$route['settings']['get'] = 'settings/index';
$route['settings/(:num)']['get'] = 'settings/find/$1';
$route['settings']['post'] = 'settings/index';
$route['settings/(:num)']['put'] = 'settings/index/$1';
$route['settings/(:num)']['delete'] = 'settings/index/$1';

// Routes for cities
$route['cities']['get'] = 'cities/index';
$route['cities/(:num)']['get'] = 'cities/find/$1';
$route['cities']['post'] = 'cities/index';
$route['cities/(:num)']['put'] = 'cities/index/$1';
$route['cities/(:num)']['delete'] = 'cities/index/$1';
