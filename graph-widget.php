<?php
/**
* Plugin Name: graph widget
* Plugin URI: https://www.your-site.com/
* Description: Create Dashboard graph widget using reactjs, wp rest api, graph script https://recharts.org/en-US/.data is in database and call by rest api
* Version: 0.1
* Author: prashant N.
* Author URI: https://www.test.in/
**/

define("PLUGIN_MAIN_FILE", __FILE__);
define("PLUGIN_DIR_PATH", plugin_dir_path( __FILE__ ));
define("PLUGIN_DIR_URL", plugin_dir_url( __FILE__ ));
require_once("modules/demo-data.php");
require_once("modules/analysis-cpt.php");
require_once("modules/widget.php");
