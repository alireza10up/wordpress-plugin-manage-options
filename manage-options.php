<?php

/**
 * Plugin Name:       manage options
 * Description:       A simple plugin for filtering words in WordPress
 * Version:           1.0.0
 * Author:            alireza10up
 * Author URI:        https://www.alireza10up.ir/
 * License:           MIT
 */

define('MO_DIR_PATH', plugin_dir_path(__FILE__));
define('MO_DIR_URL', plugin_dir_url(__FILE__));
define('MO_DIR_INC', MO_DIR_PATH . '/inc/');
define('MO_DIR_TEMPLATE', MO_DIR_PATH . '/template/');

# init

include MO_DIR_INC . 'init.php';