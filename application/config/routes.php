<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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

$route['default_controller'] = "Home_Controller";
$route['404_override'] = '';
$route['Register'] = "Register_Controller";
$route['Login'] = "LoginValidation_Controller";
$route['RegisterAction'] = "RegisterValidation_Controller";
$route['BrowseBooks'] = "BrowseBooks_Controller";
$route['BookDetail'] = "BookDetail_Controller";
$route['SearchMovies'] = "SearchMovies_Controller";
$route['RecentMovies'] = "RecentMovies_Controller";
$route['AllMovies'] = "AllMovies_Controller";
$route['MovieDetail'] = "MovieDetail_Controller";
$route['Result'] = "SearchResult_Controller";
$route['AddtoCart'] = "AddtoCart_Controller";
$route['EditCart'] = "EditCart_Controller";
$route['UpdateCart'] = "UpdateCart_Controller";
$route['RemoveItem'] = "RemoveItem_Controller";
$route['Checkout'] = "CheckOut_Controller";
$route['AddNewAuthor']= "AddNewAuthor_Controller";
$route['AddNewBook']= "AddNewBook_Controller";
$route['EditBooks'] = "EditBooks_Controller";
$route['LogOut'] = "LogOut_Controller";
$route['DeleteBook'] = "DeleteBook_Controller";
$route['UpdateBook'] = "UpdateBook_Controller";
$route['UpdateBookDetails'] = "UpdateBookDetails_Controller";
$route['UpdateAuthor']="UpdateAuthor_Controller";
$route['UpdateAuthorDetails']="UpdateAuthorDetails_Controller";
$route['SearchAuthor']="SearchAuthor_Controller";
$route['DeleteAuthor']="DeleteAuthor_Controller";
$route['UserDetails']="UserDetails_Controller";
$route['Home']="Home_Controller";



/* End of file routes.php */
/* Location: ./application/config/routes.php */