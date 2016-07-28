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
$route['umpire/:num/umpire_name'] = 'umpire/umpire_name';
$route['umpire/:num/type_name'] = 'umpire/type_name';
$route['umpire/:num/class_name'] = 'umpire/class_name';
$route['umpire/:num/subclass_name'] = 'umpire/subclass_name';
$route['umpire/:num/time'] = 'umpire/time';
$route['umpire/:num/stage_number'] = 'umpire/stage_number';
$route['umpire/:num/player1_name1'] = 'umpire/player1_name1';
$route['umpire/:num/player1_name2'] = 'umpire/player1_name2';
$route['umpire/:num/player2_name1'] = 'umpire/player2_name1';
$route['umpire/:num/player2_name2'] = 'umpire/player2_name2';
$route['umpire/:num/score_1'] = 'umpire/score_1';
$route['umpire/:num/score_2'] = 'umpire/score_2';
$route['umpire/:num/shuttlecock'] = 'umpire/shuttlecock';
$route['umpire/:num/reverse_confirm'] = 'umpire/reverse_confirm';
$route['umpire/:num/serve'] = 'umpire/serve';
$route['umpire/:num/serve_continue'] = 'umpire/serve_continue';
$route['umpire/:num/:num/add_score_1'] = 'umpire/add_score_1';
$route['umpire/:num/:num/add_score_2'] = 'umpire/add_score_2';
$route['umpire/:num/add_time'] = 'umpire/add_time';
$route['umpire/:num/time_process'] = 'umpire/time_process';
$route['umpire/:num/stage_check'] = 'umpire/stage_check';
$route['umpire/:num/add_shuttlecock'] = 'umpire/add_shuttlecock';
$route['umpire/:num/add_new_stage'] = 'umpire/add_new_stage';
$route['umpire/:num/stage_reverse'] = 'umpire/stage_reverse';
$route['umpire/:num/play_game'] = 'umpire/play_game';
$route['umpire/:num/game_over'] = 'umpire/game_over';
$route['umpire/:num/reverse'] = 'umpire/reverse';
$route['umpire/:num/reverse_team_1'] = 'umpire/reverse_team_1';
$route['umpire/:num/reverse_team_2'] = 'umpire/reverse_team_2';
$route['umpire/:num'] = 'umpire';

$route['match_control/singles'] = 'match_control';
$route['match_control/doubles'] = 'match_control';
$route['match_control/choose_type'] = 'match_control';
$route['match_control/:num'] = 'match_control';
$route['match_control/:num/:num/score_team_1'] = 'match_control/score_team_1';
$route['match_control/:num/:num/score_team_2'] = 'match_control/score_team_2';

$route['monitor/:num'] = 'monitor';
$route['monitor/:num/status'] = 'monitor/status';
$route['monitor/:num/reload'] = 'monitor/reload';

$route['default_controller'] = 'match_control';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
