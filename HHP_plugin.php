<?php
/*
    Plugin Name: my first plugin
    Plugin URI: HHP/temp/plugin
    Description: این اولین افزونه نویسی حسین حسین پور در وردپرس است.
    Author: Hossein Hosseinpour
    Author URI: HHP.org
    version: 1.0
*/

// امنیتی: جلوگیری از دسترسی مستقیم به افزونه
defined('ABSPATH') || exit; // has "ed"

// define حتما باید منحصر به فرد باشند:
// __FILE__ : آدرس سند فعلی :E:\xampp7.4.28\htdocs\wordpress\wp-content\plugins\HHP_plugin\HHP_plugin.php
define('HHP_DIR',plugin_dir_path( __FILE__ ));  // E:\xampp7.4.28\htdocs\wordpress\wp-content\plugins\HHP_plugin/
define('HHP_INC_DIR',trailingslashit( HHP_DIR.'inc' )); // E:\xampp7.4.28\htdocs\wordpress\wp-content\plugins\HHP_plugin/inc/
define('HHP_VEIW_DIR',trailingslashit( HHP_INC_DIR.'view' )); // E:\xampp7.4.28\htdocs\wordpress\wp-content\plugins\HHP_plugin/inc/view
define('HHP_URL',plugin_dir_url( __FILE__ ));   // https://localhost/wordpress/wp-content/plugins/HHP_plugin/
define('HHP_CSS_URL',trailingslashit( HHP_URL.'css' )); // https://localhost/wordpress/wp-content/plugins/HHP_plugin/css/
define('HHP_JS_URL',trailingslashit( HHP_URL.'js' )); // https://localhost/wordpress/wp-content/plugins/HHP_plugin/js/
define('HHP_IMG_URL',trailingslashit( HHP_URL.'img' )); // https://localhost/wordpress/wp-content/plugins/HHP_plugin/img/

require_once "inc/add_list_admin.php"; // add item menu admin
// OR
require_once HHP_INC_DIR."template.php"; // view
require_once HHP_INC_DIR."ajax.php"; //ajax.php
require_once HHP_INC_DIR."frontEnd.php"; // view

require_once HHP_INC_DIR."connect-DB.php";
// when active plugin :
register_activation_hook(__FILE__, "createDB"); // from connect-DB.php
// when deactive plugin :
register_deactivation_hook(__FILE__, "deleteDB"); // from connect-DB.php
