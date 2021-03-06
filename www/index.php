<?
/*------------------------------------------------------------------------------
  BerryIO Web Bootstrap
------------------------------------------------------------------------------*/
define('EXEC_MODE', 'html');
require_once('/etc/berryio/paths.php');
require_once(BASE.'/includes/configs/paths.php');


/*------------------------------------------------------------------------------
  Load the commonly used config, settings and functions
------------------------------------------------------------------------------*/
require_once(CONFIGS.'common.php');
require_once(SETTINGS.'common.php');
require_once(SETTINGS.'menu.php');
require_once(FUNCTIONS.'common.php');
require_once(FUNCTIONS.'html.php');


/*------------------------------------------------------------------------------
  Get the command and run it
------------------------------------------------------------------------------*/
$argv = explode('/', $_SERVER["SERVER_NAME"].$_SERVER['PATH_INFO']);
$args = $argv;
$exec = array_shift($args);
$exec .= $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';

// Show welcome by default
if($args[0] == '')
  go_to('welcome');

// Run command
$page['content'] = call_user_func_array('command', $args);


/*------------------------------------------------------------------------------
  Output the page
------------------------------------------------------------------------------*/
$page['selected'] = $argv[1];
echo view('layout/common', $page);
